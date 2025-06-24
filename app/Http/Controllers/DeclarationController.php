<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDeclarationRequest;
use App\Http\Requests\UpdateDeclarationRequest;
use App\Models\Declaration;
use App\Services\DeclarationService;
use App\Services\PhotoService;
use App\Services\PaymentService;
use App\Repositories\DeclarationRepository;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class DeclarationController extends Controller
{
    public function __construct(
        protected DeclarationService $declarationService,
        protected PhotoService $photoService,
        protected PaymentService $paymentService,
        protected DeclarationRepository $declarationRepository
    ) {
        $this->middleware('auth')->except(['show']);
    }

    /**
     * Lista declarações do usuário
     */
    public function index(): View
    {
        $declarations = $this->declarationRepository->getByUser(Auth::user());
        
        return view('declarations.index', compact('declarations'));
    }

    /**
     * Formulário para criar nova declaração
     */
    public function create(): View
    {
        // Temporariamente desabilitado - verificação de pagamento
        /*
        // Verifica se o usuário pode criar declaração (tem pagamento válido)
        if (!$this->paymentService->userCanCreateDeclaration(auth()->user())) {
            return redirect()->route('payment.create')
                           ->with('warning', 'Você precisa efetuar o pagamento para criar uma declaração.');
        }
        */

        return view('declarations.create');
    }

    /**
     * Armazena nova declaração
     */
    public function store(StoreDeclarationRequest $request): RedirectResponse
    {
        try {
            $declaration = $this->declarationService->create(
                auth()->user(),
                $request->validated()
            );

            return redirect()->route('declarations.show', $declaration)
                           ->with('success', 'Declaração criada com sucesso!');
                           
        } catch (\Exception $e) {
            return back()->withInput()
                        ->with('error', 'Erro ao criar declaração: ' . $e->getMessage());
        }
    }

    /**
     * Exibe declaração específica
     */
    public function show(string $slug): View
    {
        $declaration = $this->declarationRepository->findBySlug($slug);
        
        if (!$declaration) {
            abort(404, 'Declaração não encontrada');
        }

        // Se é visualização pública, verifica se está publicada
        if (!auth()->check() || auth()->id() !== $declaration->user_id) {
            if (!$this->declarationService->canViewPublicly($declaration)) {
                abort(404, 'Declaração não está disponível publicamente');
            }
        }

        // Obtém dados para visualização
        $photos = $this->photoService->getGalleryData($declaration);
        $statistics = $this->declarationService->getStatistics($declaration);

        return view('declarations.show', compact('declaration', 'photos', 'statistics'));
    }

    /**
     * Formulário para editar declaração
     */
    public function edit(Declaration $declaration): View
    {
        $this->authorize('update', $declaration);

        if (!$this->declarationService->canEdit($declaration)) {
            return redirect()->route('declarations.show', $declaration)
                           ->with('error', 'Esta declaração não pode ser editada.');
        }

        return view('declarations.edit', compact('declaration'));
    }

    /**
     * Atualiza declaração
     */
    public function update(UpdateDeclarationRequest $request, Declaration $declaration): RedirectResponse
    {
        try {
            $this->declarationService->update($declaration, $request->validated());

            return redirect()->route('declarations.show', $declaration)
                           ->with('success', 'Declaração atualizada com sucesso!');
                           
        } catch (\Exception $e) {
            return back()->withInput()
                        ->with('error', 'Erro ao atualizar declaração: ' . $e->getMessage());
        }
    }

    /**
     * Remove declaração
     */
    public function destroy(Declaration $declaration): RedirectResponse
    {
        $this->authorize('delete', $declaration);

        try {
            $this->declarationRepository->delete($declaration);

            return redirect()->route('declarations.index')
                           ->with('success', 'Declaração excluída com sucesso!');
                           
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao excluir declaração: ' . $e->getMessage());
        }
    }

    /**
     * Publica declaração
     */
    public function publish(Declaration $declaration): RedirectResponse
    {
        $this->authorize('update', $declaration);

        try {
            $this->declarationService->publish($declaration);

            return back()->with('success', 'Declaração publicada com sucesso!');
            
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao publicar declaração: ' . $e->getMessage());
        }
    }

    /**
     * Despublica declaração
     */
    public function unpublish(Declaration $declaration): RedirectResponse
    {
        $this->authorize('update', $declaration);

        try {
            $this->declarationService->unpublish($declaration);

            return back()->with('success', 'Declaração despublicada com sucesso!');
            
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao despublicar declaração: ' . $e->getMessage());
        }
    }

    /**
     * Alterna privacidade da declaração
     */
    public function togglePrivacy(Declaration $declaration): RedirectResponse
    {
        $this->authorize('update', $declaration);

        try {
            $this->declarationService->togglePrivacy($declaration);

            $status = $declaration->fresh()->is_public ? 'pública' : 'privada';
            return back()->with('success', "Declaração alterada para {$status} com sucesso!");
            
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao alterar privacidade: ' . $e->getMessage());
        }
    }

    /**
     * Gera novo QR Code
     */
    public function generateQrCode(Declaration $declaration): RedirectResponse
    {
        $this->authorize('update', $declaration);

        try {
            $this->declarationService->generateQrCode($declaration);

            return back()->with('success', 'QR Code gerado com sucesso!');
            
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao gerar QR Code: ' . $e->getMessage());
        }
    }
}
