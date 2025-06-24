<?php

namespace App\Http\Controllers;

use App\Repositories\DeclarationRepository;
use App\Services\PaymentService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(
        protected DeclarationRepository $declarationRepository,
        protected PaymentService $paymentService
    ) {}

    /**
     * Página inicial - Landing page de vendas
     */
    public function index()
    {
        return view('home.index');
    }

    /**
     * Página sobre o projeto
     */
    public function about()
    {
        return view('home.about');
    }

    /**
     * Página de contato
     */
    public function contact()
    {
        return view('home.contact');
    }

    /**
     * Página de termos de uso
     */
    public function terms()
    {
        return view('home.terms');
    }

    /**
     * Página de política de privacidade
     */
    public function privacy()
    {
        return view('home.privacy');
    }

    /**
     * Galeria pública de declarações
     */
    public function gallery(Request $request)
    {
        $perPage = $request->get('per_page', 12);
        $declarations = $this->declarationRepository->getPublicPaginated($perPage);

        return view('home.gallery', compact('declarations'));
    }
}
