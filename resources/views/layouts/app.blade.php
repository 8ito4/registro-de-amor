<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Registro de Amor' }} - Eternize seu amor</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=dancing-script:400,500,600,700|poppins:300,400,500,600,700" rel="stylesheet" />

    <!-- Styles -->
    <style>
        .romantic-font {
            font-family: 'Dancing Script', cursive;
            letter-spacing: 0.5px;
        }

        .custom-navbar {
            background-color: rgba(0, 0, 0, 0.8) !important;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Stripe -->
    <script src="https://js.stripe.com/v3/"></script>

    <!-- Anime.js -->
    <script src="https://cdn.jsdelivr.net/npm/animejs@3.2.1/lib/anime.min.js"></script>

    <!-- AOS - Animate On Scroll -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    
    <!-- Three.js para efeitos 3D -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>

    <!-- Alpine.js -->
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <!-- Meta Tags -->
    <meta name="description" content="{{ $description ?? 'Crie uma declaração de amor única e eterna para seu relacionamento. Adicione fotos, eventos especiais e compartilhe com o mundo.' }}">
    <meta name="keywords" content="declaração de amor, relacionamento, casal, amor eterno, fotos de casal">
    
    <!-- Open Graph -->
    <meta property="og:title" content="{{ $title ?? 'Registro de Amor' }}">
    <meta property="og:description" content="{{ $description ?? 'Eternize seu amor com uma declaração única' }}">
    <meta property="og:image" content="{{ asset('images/og-image.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    @stack('head')
</head>
<body class="font-sans antialiased bg-gray-900">
    <div class="min-h-screen bg-gray-900">
        <!-- Navigation -->
        <nav class="custom-navbar backdrop-blur-sm shadow-lg border-b border-gray-800 fixed w-full z-50">
            <div class="max-w-full mx-auto px-6">
                <div class="flex items-center justify-between h-20">
                    <!-- Logo -->
                    <a href="{{ route('home') }}" class="flex items-center space-x-3 ml-4">
                        <span class="text-2xl font-bold romantic-font text-white">Registro de Amor</span>
                    </a>

                    <!-- Desktop Navigation -->
                    <div class="hidden md:flex items-center space-x-4">
                        <div class="flex space-x-8">
                            <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'text-pink-400' : 'text-gray-300' }} text-lg">
                                Início
                            </a>
                            <a href="{{ route('gallery') }}" class="nav-link {{ request()->routeIs('gallery') ? 'text-pink-400' : 'text-gray-300' }} text-lg">
                                Galeria
                            </a>
                            <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'text-pink-400' : 'text-gray-300' }} text-lg">
                                Sobre
                            </a>
                            <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'text-pink-400' : 'text-gray-300' }} text-lg">
                                Contato
                            </a>
                        </div>
                    </div>

                    <!-- Right Side -->
                    <div class="flex items-center space-x-8 mr-4">
                        @auth
                            <!-- User Menu -->
                            <div class="relative group">
                                <button class="flex items-center space-x-3 text-gray-300 hover:text-pink-400 transition-colors">
                                    <div class="w-12 h-12 bg-gradient-to-r from-pink-500 to-red-500 rounded-full flex items-center justify-center">
                                        <span class="text-white text-lg font-semibold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                                    </div>
                                    <span class="text-lg">{{ Auth::user()->name }}</span>
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                
                                <!-- Dropdown -->
                                <div class="absolute right-0 mt-3 w-48 bg-gray-800 border border-gray-700 rounded-lg shadow-xl py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                                    <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white">Dashboard</a>
                                    <a href="{{ route('declarations.index') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white">Minhas Declarações</a>
                                    <a href="{{ route('payment.history') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white">Pagamentos</a>
                                    <hr class="my-2 border-gray-700">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white">
                                            Sair
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @else
                            <div class="flex items-center space-x-6">
                                <a href="{{ route('login') }}" class="login-button text-lg text-gray-300 hover:text-pink-400 transition-all duration-300">Entrar</a>
                                <a href="{{ route('register') }}" class="cta-button bg-gradient-to-r from-pink-500 to-red-500 text-white font-semibold px-8 py-3 rounded-full hover:from-pink-600 hover:to-red-600 transition-all duration-300 text-lg">
                                    Começar Agora
                                </a>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="pt-16">
            <!-- Flash Messages -->
            @if (session('success'))
                <div class="bg-green-900/50 border border-green-600 text-green-200 px-4 py-3 rounded mb-4 mx-4 mt-4 backdrop-blur-sm">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-900/50 border border-red-600 text-red-200 px-4 py-3 rounded mb-4 mx-4 mt-4 backdrop-blur-sm">
                    {{ session('error') }}
                </div>
            @endif

            @if (session('warning'))
                <div class="bg-yellow-900/50 border border-yellow-600 text-yellow-200 px-4 py-3 rounded mb-4 mx-4 mt-4 backdrop-blur-sm">
                    {{ session('warning') }}
                </div>
            @endif

            @if (session('info'))
                <div class="bg-blue-900/50 border border-blue-600 text-blue-200 px-4 py-3 rounded mb-4 mx-4 mt-4 backdrop-blur-sm">
                    {{ session('info') }}
                </div>
            @endif

            @yield('content')
        </main>

        <!-- FAQ Section -->
        <section class="relative py-32 bg-[#0B0F19] overflow-hidden">
            <!-- Decorative Elements -->
            <div class="absolute inset-0">
                <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-pink-500/5 via-red-500/5 to-transparent"></div>
                <div class="absolute bottom-0 right-0 w-full h-full bg-gradient-to-tl from-red-500/5 via-pink-500/5 to-transparent"></div>
            </div>
            
            <!-- Floating Orbs -->
            <div class="absolute inset-0 overflow-hidden">
                <div class="orb orb-1"></div>
                <div class="orb orb-2"></div>
                <div class="orb orb-3"></div>
            </div>
            
            <div class="relative max-w-4xl mx-auto px-4">
                <!-- Section Header -->
                <div class="text-center mb-20" data-aos="fade-up">
                    <div class="inline-flex items-center justify-center space-x-2 mb-8">
                        <span class="w-12 h-[1px] bg-gradient-to-r from-transparent via-pink-500 to-transparent"></span>
                        <span class="text-pink-500 font-medium tracking-wider text-sm">FAQ</span>
                        <span class="w-12 h-[1px] bg-gradient-to-r from-transparent via-pink-500 to-transparent"></span>
                    </div>
                    
                    <h2 class="text-4xl md:text-5xl font-bold mb-8 romantic-font">
                        <span class="relative inline-block">
                            <span class="relative z-10 text-transparent bg-clip-text bg-gradient-to-r from-pink-500 via-red-400 to-pink-500">
                                Perguntas Frequentes
                            </span>
                            <span class="absolute top-1/2 left-0 w-full h-1/3 bg-gradient-to-r from-pink-500/20 via-red-400/20 to-pink-500/20 blur-xl transform -translate-y-1/2"></span>
                        </span>
                    </h2>
                    
                    <p class="text-gray-400 text-lg max-w-2xl mx-auto leading-relaxed">
                        Tire suas dúvidas sobre nossa plataforma e descubra como eternizar seu amor de forma única e especial
                    </p>
                </div>

                <!-- FAQ Items -->
                <div x-data="{ activeTab: null }" class="space-y-6">
                    @php
                    $faqItems = [
                        [
                            'id' => 1,
                            'question' => 'Como funciona o Registro de Amor?',
                            'answer' => 'Nossa plataforma permite que você crie uma página personalizada para expressar seu amor. Você pode adicionar fotos, mensagens especiais, músicas e muito mais para criar uma declaração única.'
                        ],
                        [
                            'id' => 2,
                            'question' => 'Por quanto tempo minha página ficará disponível?',
                            'answer' => 'Sua página ficará disponível para sempre! Uma vez criada, ela permanecerá online indefinidamente, permitindo que você e seu amor revisitem essas memórias especiais quando quiserem.'
                        ],
                        [
                            'id' => 3,
                            'question' => 'Posso editar minha página depois de criada?',
                            'answer' => 'Sim! Você pode editar sua página quantas vezes quiser. Atualize fotos, mensagens e outros elementos para manter sua declaração sempre especial e atualizada.'
                        ],
                        [
                            'id' => 4,
                            'question' => 'Como faço para compartilhar minha página?',
                            'answer' => 'Cada página tem um link único e um QR Code que você pode compartilhar facilmente. Além disso, você pode definir sua página como pública ou privada para controlar quem pode visualizá-la.'
                        ],
                        [
                            'id' => 5,
                            'question' => 'Quais formas de pagamento são aceitas?',
                            'answer' => 'Aceitamos diversas formas de pagamento, incluindo cartões de crédito, PIX e boleto bancário. Todas as transações são processadas de forma segura através da plataforma Stripe.'
                        ]
                    ];
                    @endphp

                    @foreach($faqItems as $item)
                    <div class="faq-card group" 
                         x-data="{ isHovered: false }" 
                         @mouseenter="isHovered = true" 
                         @mouseleave="isHovered = false">
                        <!-- Card Background -->
                        <div class="absolute inset-0 bg-gradient-to-r from-gray-800/50 to-gray-900/50 rounded-2xl backdrop-blur-xl border border-white/5 transition-all duration-500 group-hover:border-pink-500/20"></div>
                        
                        <!-- Animated Border -->
                        <div class="absolute inset-0 rounded-2xl transition-all duration-500 [mask-image:linear-gradient(white,transparent)]">
                            <div class="absolute inset-[-1000%] animate-[spin_2s_linear_infinite] bg-[conic-gradient(from_0deg,transparent_0_340deg,white_360deg)]"
                                 :class="{ 'opacity-100': isHovered, 'opacity-0': !isHovered }">
                            </div>
                        </div>
                        
                        <!-- Content -->
                        <div class="relative p-6">
                            <button 
                                @click="activeTab = activeTab === {{ $item['id'] }} ? null : {{ $item['id'] }}"
                                class="w-full flex items-center justify-between"
                            >
                                <span class="text-lg font-medium text-white group-hover:text-pink-400 transition-colors duration-300">
                                    {{ $item['question'] }}
                                </span>
                                <span class="ml-6 flex-shrink-0">
                                    <div class="relative w-8 h-8">
                                        <!-- Círculo de fundo com gradiente -->
                                        <div class="absolute inset-0 rounded-full bg-gradient-to-r from-pink-500/20 to-red-500/20 transform transition-transform duration-300"
                                             :class="{ 'scale-100': activeTab === {{ $item['id'] }}, 'scale-0': activeTab !== {{ $item['id'] }} }">
                                        </div>
                                        <!-- Ícone -->
                                        <svg 
                                            class="absolute inset-0 w-8 h-8 text-pink-400 transform transition-transform duration-300"
                                            :class="{ 'rotate-45': activeTab === {{ $item['id'] }} }"
                                            fill="none" 
                                            stroke="currentColor" 
                                            viewBox="0 0 24 24"
                                        >
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                        </svg>
                                    </div>
                                </span>
                            </button>

                            <!-- Answer -->
                            <div 
                                x-show="activeTab === {{ $item['id'] }}"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 transform -translate-y-2"
                                x-transition:enter-end="opacity-100 transform translate-y-0"
                                x-transition:leave="transition ease-in duration-200"
                                x-transition:leave-start="opacity-100 transform translate-y-0"
                                x-transition:leave-end="opacity-0 transform -translate-y-2"
                                class="relative mt-6"
                            >
                                <!-- Linha decorativa -->
                                <div class="h-px w-full bg-gradient-to-r from-transparent via-pink-500/30 to-transparent mb-6"></div>
                                
                                <div class="text-gray-400 leading-relaxed">
                                    {{ $item['answer'] }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Contact CTA -->
                <div class="text-center mt-24">
                    <p class="text-gray-400 mb-8 text-lg">Ainda tem dúvidas?</p>
                    <a 
                        href="{{ route('contact') }}" 
                        class="relative inline-flex items-center px-8 py-4 rounded-xl overflow-hidden group"
                    >
                        <!-- Fundo animado -->
                        <div class="absolute inset-0 bg-gradient-to-r from-pink-500 to-red-500 transition-all duration-300 group-hover:scale-110"></div>
                        <div class="absolute inset-0 bg-[linear-gradient(45deg,transparent_25%,rgba(255,255,255,0.2)_50%,transparent_75%)] bg-[length:250%_250%] animate-shimmer"></div>
                        
                        <!-- Texto e ícone -->
                        <span class="relative flex items-center text-white font-medium">
                            Entre em contato
                            <svg class="w-5 h-5 ml-2 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </span>
                    </a>
                </div>
            </div>
        </section>

        <style>
            @keyframes gradient-x {
                0%, 100% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
            }

            @keyframes gradient-slow {
                0%, 100% { transform: translate(0, 0) rotate(0deg); }
                25% { transform: translate(10%, 10%) rotate(5deg); }
                50% { transform: translate(0, 20%) rotate(0deg); }
                75% { transform: translate(-10%, 10%) rotate(-5deg); }
            }

            @keyframes pulse-slow {
                0%, 100% { opacity: 0.8; }
                50% { opacity: 1; }
            }

            .animate-gradient-x {
                animation: gradient-x 15s linear infinite;
                background-size: 200% auto;
            }

            .animate-gradient-slow {
                animation: gradient-slow 20s ease-in-out infinite;
            }

            .animate-pulse-slow {
                animation: pulse-slow 3s ease-in-out infinite;
            }

            .faq-item {
                transform: translateZ(0);
            }

            .faq-item::before {
                content: '';
                position: absolute;
                inset: -1px;
                background: linear-gradient(45deg, transparent, rgba(236, 72, 153, 0.3), transparent);
                border-radius: 1rem;
                opacity: 0;
                transition: opacity 0.3s ease;
            }

            .faq-item:hover::before {
                opacity: 1;
            }

            /* Orbs flutuantes */
            .orb {
                @apply absolute rounded-full blur-3xl opacity-50 animate-float;
                background: radial-gradient(circle at center, var(--color), transparent 70%);
            }

            .orb-1 {
                --color: rgba(236, 72, 153, 0.15);
                width: 50rem;
                height: 50rem;
                top: -25rem;
                left: -25rem;
                animation-duration: 15s;
            }

            .orb-2 {
                --color: rgba(239, 68, 68, 0.15);
                width: 40rem;
                height: 40rem;
                top: 50%;
                right: -20rem;
                animation-duration: 20s;
                animation-delay: -2s;
            }

            .orb-3 {
                --color: rgba(236, 72, 153, 0.15);
                width: 30rem;
                height: 30rem;
                bottom: -15rem;
                left: 50%;
                animation-duration: 25s;
                animation-delay: -5s;
            }

            /* Animações */
            @keyframes float {
                0%, 100% {
                    transform: translate(0, 0) rotate(0deg);
                }
                25% {
                    transform: translate(5%, 5%) rotate(5deg);
                }
                50% {
                    transform: translate(0, 10%) rotate(0deg);
                }
                75% {
                    transform: translate(-5%, 5%) rotate(-5deg);
                }
            }

            @keyframes shimmer {
                0% { background-position: 200% 0; }
                100% { background-position: -200% 0; }
            }

            .animate-shimmer {
                animation: shimmer 8s linear infinite;
            }

            .faq-card {
                @apply relative rounded-2xl transition-all duration-500 hover:transform hover:scale-[1.02];
            }

            .faq-card::before {
                content: '';
                @apply absolute -inset-[1px] rounded-2xl bg-gradient-to-r from-transparent via-pink-500/30 to-transparent opacity-0 transition-opacity duration-300;
                mask-image: linear-gradient(black, black);
            }

            .faq-card:hover::before {
                @apply opacity-100;
            }

            /* Animação suave para o texto */
            .text-gradient {
                @apply bg-clip-text text-transparent bg-gradient-to-r from-pink-500 via-red-400 to-pink-500 bg-[length:200%_auto] animate-text-gradient;
            }

            @keyframes text-gradient {
                0% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
                100% { background-position: 0% 50%; }
            }

            .animate-text-gradient {
                animation: text-gradient 4s linear infinite;
            }
        </style>

        <!-- Footer -->
        <footer class="bg-[#0B0F19] py-12 border-t border-gray-800/50">
            <div class="max-w-7xl mx-auto px-4">
                <div class="flex flex-col md:flex-row justify-center items-center gap-12 md:gap-24">
                    <!-- Links -->
                    <div>
                        <h3 class="text-white text-lg font-medium mb-4">Links</h3>
                        <ul class="flex flex-col items-center gap-3">
                            <li><a href="{{ route('about') }}" class="text-gray-400 hover:text-white transition-colors">Sobre</a></li>
                            <li><a href="{{ route('contact') }}" class="text-gray-400 hover:text-white transition-colors">Contato</a></li>
                            <li><a href="{{ route('gallery') }}" class="text-gray-400 hover:text-white transition-colors">Galeria</a></li>
                        </ul>
                    </div>

                    <!-- Legal -->
                    <div>
                        <h3 class="text-white text-lg font-medium mb-4">Legal</h3>
                        <ul class="flex flex-col items-center gap-3">
                            <li><a href="{{ route('terms') }}" class="text-gray-400 hover:text-white transition-colors">Termos de Uso</a></li>
                            <li><a href="{{ route('privacy') }}" class="text-gray-400 hover:text-white transition-colors">Privacidade</a></li>
                        </ul>
                    </div>
                </div>

                <div class="mt-12 text-center text-sm text-gray-400">
                    <p>&copy; {{ date('Y') }} Registro de Amor</p>
                </div>
            </div>
        </footer>
    </div>

    @stack('scripts')

    <style>
        .nav-link {
            @apply hover:text-pink-400 transition-all duration-300 font-medium relative;
            position: relative;
            overflow: hidden;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #ec4899, #ef4444);
            transition: width 0.3s ease;
        }

        .nav-link:hover::before {
            width: 100%;
        }

        .nav-link:hover {
            transform: translateY(-2px);
            text-shadow: 0 0 10px rgba(236, 72, 153, 0.5);
        }

        /* Animação do logo */
        .logo-container:hover .logo-icon {
            transform: scale(1.2) rotate(360deg);
            animation: heartbeat 0.6s ease-in-out;
        }

        @keyframes heartbeat {
            0%, 100% { transform: scale(1.2) rotate(360deg); }
            50% { transform: scale(1.4) rotate(360deg); }
        }

        /* Animação do botão de login */
        .login-button {
            position: relative;
            overflow: hidden;
        }

        .login-button::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #ec4899, #ef4444);
            transition: width 0.3s ease;
        }

        .login-button:hover::after {
            width: 100%;
        }

        .login-button:hover {
            transform: translateY(-2px);
            text-shadow: 0 0 10px rgba(236, 72, 153, 0.3);
        }

        /* Botão CTA animado */
        .cta-button {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .cta-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s ease;
        }

        .cta-button:hover::before {
            left: 100%;
        }

        .cta-button:hover {
            transform: translateY(-2px) scale(1.05);
            box-shadow: 0 10px 25px rgba(236, 72, 153, 0.4);
        }

        /* Menu dropdown animado */
        .user-menu {
            transition: all 0.3s ease;
        }

        .user-menu:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-menu {
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }

        .dropdown-menu a {
            transition: all 0.2s ease;
        }

        .dropdown-menu a:hover {
            transform: translateX(5px);
            background: linear-gradient(90deg, #374151, #4b5563);
        }

        .footer-link {
            @apply text-gray-400 hover:text-white transition-all duration-300 text-lg relative;
        }

        .footer-link:hover {
            text-shadow: 0 0 10px rgba(236, 72, 153, 0.3);
            transform: translateY(-1px);
        }

        .footer-column {
            @apply relative;
        }

        .footer-column::before {
            content: '';
            position: absolute;
            top: -20px;
            left: 50%;
            transform: translateX(-50%);
            width: 40px;
            height: 2px;
            background: linear-gradient(90deg, transparent, #ec4899, transparent);
        }

        @media (min-width: 768px) {
            .footer-column:first-child::after {
                content: '';
                position: absolute;
                top: 50%;
                right: -30px;
                transform: translateY(-50%);
                width: 1px;
                height: 80%;
                background: linear-gradient(180deg, transparent, #ec4899, transparent);
            }
        }
    </style>
</body>
</html> 