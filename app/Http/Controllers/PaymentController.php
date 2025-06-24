<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\PaymentService;
use App\Services\DeclarationService;
use App\Repositories\PaymentRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Stripe\Webhook;
use Stripe\Exception\SignatureVerificationException;

class PaymentController extends Controller
{
    public function __construct(
        protected PaymentService $paymentService,
        protected DeclarationService $declarationService,
        protected PaymentRepository $paymentRepository
    ) {
        $this->middleware('auth')->except(['webhook']);
    }

    /**
     * Página de checkout
     */
    public function create()
    {
        $price = $this->paymentService->getDeclarationPrice();
        
        // Temporariamente redireciona para dashboard informando que pagamento está desabilitado
        return redirect()->route('dashboard')
                       ->with('info', 'Sistema de pagamentos temporariamente desabilitado. Você pode criar declarações gratuitamente por enquanto.');
        
        // return view('payment.create', compact('price'));
    }

    /**
     * Processa pagamento
     */
    public function process(Request $request): JsonResponse
    {
        $request->validate([
            'amount' => 'required|numeric|min:0.01'
        ]);

        try {
            $paymentData = $this->paymentService->createPaymentIntent(
                Auth::user(),
                $request->amount
            );

            return response()->json([
                'success' => true,
                'client_secret' => $paymentData['client_secret'],
                'payment_intent_id' => $paymentData['payment_intent_id']
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Página de sucesso do pagamento
     */
    public function success(Request $request): View
    {
        $paymentIntentId = $request->get('payment_intent');
        
        if ($paymentIntentId) {
            // Verifica status do pagamento
            $payment = $this->paymentRepository->findByStripePaymentIntentId($paymentIntentId);
            
            if ($payment && $payment->isCompleted()) {
                return view('payment.success', compact('payment'));
            }
        }

        return view('payment.success')->with('warning', 'Pagamento não encontrado ou não confirmado.');
    }

    /**
     * Página de cancelamento
     */
    public function cancelled(): View
    {
        return view('payment.cancelled');
    }

    /**
     * Histórico de pagamentos do usuário
     */
    public function history(): View
    {
        $payments = $this->paymentService->getUserPaymentHistory(Auth::user());
        
        return view('payment.history', compact('payments'));
    }

    /**
     * Webhook do Stripe
     */
    public function webhook(Request $request): JsonResponse
    {
        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');
        $endpointSecret = config('services.stripe.webhook_secret');

        try {
            $event = Webhook::constructEvent($payload, $sigHeader, $endpointSecret);
        } catch (SignatureVerificationException $e) {
            return response()->json(['error' => 'Invalid signature'], 400);
        }

        // Processa diferentes tipos de eventos
        switch ($event['type']) {
            case 'payment_intent.succeeded':
                $this->handlePaymentSucceeded($event['data']['object']);
                break;
                
            case 'payment_intent.payment_failed':
                $this->handlePaymentFailed($event['data']['object']);
                break;
                
            default:
                // Evento não tratado
                break;
        }

        return response()->json(['status' => 'success']);
    }

    /**
     * Trata pagamento bem-sucedido
     */
    protected function handlePaymentSucceeded(array $paymentIntent): void
    {
        try {
            $payment = $this->paymentService->confirmPayment($paymentIntent['id']);
            
            // Log do pagamento confirmado
            Log::info('Pagamento confirmado', [
                'payment_id' => $payment->id,
                'user_id' => $payment->user_id,
                'amount' => $payment->amount
            ]);
            
        } catch (\Exception $e) {
            Log::error('Erro ao confirmar pagamento', [
                'payment_intent_id' => $paymentIntent['id'],
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Trata pagamento falhado
     */
    protected function handlePaymentFailed(array $paymentIntent): void
    {
        try {
            $payment = $this->paymentRepository->findByStripePaymentIntentId($paymentIntent['id']);
            
            if ($payment) {
                $this->paymentRepository->markAsFailed($payment);
                
                Log::info('Pagamento falhou', [
                    'payment_id' => $payment->id,
                    'user_id' => $payment->user_id,
                    'error' => $paymentIntent['last_payment_error']['message'] ?? 'Erro desconhecido'
                ]);
            }
            
        } catch (\Exception $e) {
            Log::error('Erro ao processar falha de pagamento', [
                'payment_intent_id' => $paymentIntent['id'],
                'error' => $e->getMessage()
            ]);
        }
    }
}
