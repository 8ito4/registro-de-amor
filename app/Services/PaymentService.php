<?php

namespace App\Services;

use App\Models\Payment;
use App\Models\User;
use App\Repositories\PaymentRepository;
// use Stripe\StripeClient;
// use Stripe\PaymentIntent;
use Exception;

class PaymentService
{
    // protected StripeClient $stripe;
    
    public function __construct(
        protected PaymentRepository $paymentRepository
    ) {
        // Temporariamente desabilitado - configurar Stripe depois
        // $this->stripe = new StripeClient(config('services.stripe.secret'));
    }

    /**
     * Cria Payment Intent no Stripe
     */
    public function createPaymentIntent(User $user, float $amount): array
    {
        // Temporariamente desabilitado - retorna dados simulados
        throw new Exception('Funcionalidade de pagamento temporariamente desabilitada. Configure o Stripe para usar.');
        
        /*
        try {
            $paymentIntent = $this->stripe->paymentIntents->create([
                'amount' => $amount * 100, // Stripe usa centavos
                'currency' => 'brl',
                'payment_method_types' => ['card'],
                'metadata' => [
                    'user_id' => $user->id,
                    'user_email' => $user->email,
                ]
            ]);

            // Cria registro no banco
            $payment = $this->paymentRepository->create([
                'user_id' => $user->id,
                'stripe_payment_intent_id' => $paymentIntent->id,
                'payment_method' => 'stripe',
                'amount' => $amount,
                'currency' => 'BRL',
                'status' => 'pending',
                'payment_data' => [
                    'stripe_data' => $paymentIntent->toArray()
                ],
                'invoice_number' => Payment::generateInvoiceNumber(),
            ]);

            return [
                'payment' => $payment,
                'client_secret' => $paymentIntent->client_secret,
                'payment_intent_id' => $paymentIntent->id,
            ];
            
        } catch (Exception $e) {
            throw new Exception('Erro ao criar pagamento: ' . $e->getMessage());
        }
        */
    }

    /**
     * Confirma pagamento via webhook do Stripe
     */
    public function confirmPayment(string $paymentIntentId): Payment
    {
        $payment = $this->paymentRepository->findByStripePaymentIntentId($paymentIntentId);
        
        if (!$payment) {
            throw new Exception('Pagamento não encontrado');
        }

        // Temporariamente desabilitado
        throw new Exception('Funcionalidade de confirmação de pagamento temporariamente desabilitada.');
        
        /*
        try {
            $paymentIntent = $this->stripe->paymentIntents->retrieve($paymentIntentId);
            
            if ($paymentIntent->status === 'succeeded') {
                $payment = $this->paymentRepository->markAsCompleted($payment);
                
                // Atualiza dados do pagamento
                $this->paymentRepository->update($payment, [
                    'payment_data' => array_merge(
                        $payment->payment_data ?? [],
                        ['stripe_confirmed_data' => $paymentIntent->toArray()]
                    )
                ]);
            }

            return $payment;
            
        } catch (Exception $e) {
            $this->paymentRepository->markAsFailed($payment);
            throw new Exception('Erro ao confirmar pagamento: ' . $e->getMessage());
        }
        */
    }

    /**
     * Verifica status do pagamento no Stripe
     */
    public function checkPaymentStatus(Payment $payment): string
    {
        // Temporariamente retorna o status atual sem verificar no Stripe
        return $payment->status;
        
        /*
        if (!$payment->stripe_payment_intent_id) {
            return $payment->status;
        }

        try {
            $paymentIntent = $this->stripe->paymentIntents->retrieve($payment->stripe_payment_intent_id);
            
            $status = match ($paymentIntent->status) {
                'succeeded' => 'completed',
                'processing' => 'pending',
                'requires_payment_method' => 'pending',
                'requires_confirmation' => 'pending',
                'requires_action' => 'pending',
                'canceled' => 'failed',
                default => 'failed'
            };

            if ($status !== $payment->status) {
                if ($status === 'completed') {
                    $this->paymentRepository->markAsCompleted($payment);
                } elseif ($status === 'failed') {
                    $this->paymentRepository->markAsFailed($payment);
                }
            }

            return $status;
            
        } catch (Exception $e) {
            return $payment->status;
        }
        */
    }

    /**
     * Processa refund
     */
    public function refund(Payment $payment, ?float $amount = null): bool
    {
        throw new Exception('Funcionalidade de reembolso temporariamente desabilitada.');
        
        /*
        if (!$payment->isCompleted()) {
            throw new Exception('Apenas pagamentos completados podem ser reembolsados');
        }

        try {
            $refundAmount = $amount ? ($amount * 100) : ($payment->amount * 100);
            
            $refund = $this->stripe->refunds->create([
                'payment_intent' => $payment->stripe_payment_intent_id,
                'amount' => $refundAmount,
            ]);

            // Atualiza status do pagamento
            $this->paymentRepository->update($payment, [
                'status' => 'refunded',
                'payment_data' => array_merge(
                    $payment->payment_data ?? [],
                    ['refund_data' => $refund->toArray()]
                )
            ]);

            return true;
            
        } catch (Exception $e) {
            throw new Exception('Erro ao processar reembolso: ' . $e->getMessage());
        }
        */
    }

    /**
     * Obtém preço da declaração
     */
    public function getDeclarationPrice(): float
    {
        return config('services.stripe.declaration_price', 29.90);
    }

    /**
     * Verifica se usuário pode criar declaração
     * Temporariamente sempre retorna true para testes
     */
    public function userCanCreateDeclaration(User $user): bool
    {
        // Temporariamente sempre permite criar declaração para testes
        return true;
        
        // Código original:
        // return $this->paymentRepository->userHasValidPayment($user);
    }

    /**
     * Obtém histórico de pagamentos do usuário
     */
    public function getUserPaymentHistory(User $user): array
    {
        $payments = $this->paymentRepository->getByUser($user);
        
        return $payments->map(function ($payment) {
            return [
                'id' => $payment->id,
                'amount' => $payment->formatted_amount,
                'status' => $payment->status,
                'payment_method' => $payment->payment_method,
                'invoice_number' => $payment->invoice_number,
                'created_at' => $payment->created_at->format('d/m/Y H:i'),
                'paid_at' => $payment->paid_at?->format('d/m/Y H:i'),
            ];
        })->toArray();
    }
} 