<?php

namespace App\Http\Controllers;

use App\Services\DeclarationService;
use App\Services\PaymentService;
use App\Repositories\DeclarationRepository;
use App\Repositories\PaymentRepository;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct(
        protected DeclarationService $declarationService,
        protected PaymentService $paymentService,
        protected DeclarationRepository $declarationRepository,
        protected PaymentRepository $paymentRepository
    ) {
        $this->middleware('auth');
    }

    /**
     * Dashboard principal do usuário
     */
    public function index(): View
    {
        $user = Auth::user();
        
        // Estatísticas gerais
        $declarations = $this->declarationRepository->getByUser($user);
        $payments = $this->paymentRepository->getByUser($user);
        
        // Calcula estatísticas
        $stats = [
            'declarations_count' => $declarations->count(),
            'published_declarations' => $declarations->where('is_public', true)->count(),
            'draft_declarations' => $declarations->where('status', 'draft')->count(),
            'total_payments' => $payments->where('status', 'completed')->sum('amount'),
            'pending_payments' => $payments->where('status', 'pending')->count(),
            'can_create_declaration' => $this->paymentService->userCanCreateDeclaration($user)
        ];

        // Declarações recentes
        $recentDeclarations = $declarations->take(5);
        
        // Últimos pagamentos
        $recentPayments = $payments->where('status', 'completed')
                                 ->sortByDesc('paid_at')
                                 ->take(5);

        // Declaração mais visualizada (simulado - implementar analytics depois)
        $popularDeclaration = $declarations->where('is_public', true)->first();

        return view('dashboard.index', compact(
            'stats',
            'recentDeclarations', 
            'recentPayments',
            'popularDeclaration'
        ));
    }

    /**
     * Estatísticas detalhadas
     */
    public function statistics(): View
    {
        $user = Auth::user();
        $declarations = $this->declarationRepository->getByUser($user);
        
        $detailedStats = [
            'declarations' => [
                'total' => $declarations->count(),
                'published' => $declarations->where('is_public', true)->count(),
                'draft' => $declarations->where('status', 'draft')->count(),
                'active' => $declarations->where('is_active', true)->count(),
            ],
            'photos' => [
                'total' => $declarations->sum(function($declaration) {
                    return $declaration->photos()->count();
                })
            ],
            'events' => [
                'total' => $declarations->sum(function($declaration) {
                    return $declaration->events()->count();
                })
            ],
            'payments' => [
                'total_amount' => $this->paymentRepository->getCompletedByUser($user)->sum('amount'),
                'total_count' => $this->paymentRepository->getCompletedByUser($user)->count(),
            ]
        ];

        return view('dashboard.statistics', compact('detailedStats'));
    }

    /**
     * Configurações da conta
     */
    public function settings(): View
    {
        $user = Auth::user();
        
        return view('dashboard.settings', compact('user'));
    }
}
