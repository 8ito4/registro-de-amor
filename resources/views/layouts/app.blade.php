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
        <nav class="bg-black/90 backdrop-blur-sm shadow-lg border-b border-gray-800 fixed w-full z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <!-- Logo -->
                        <a href="{{ route('home') }}" class="flex items-center space-x-2 group logo-container">
                            <div class="w-8 h-8 bg-gradient-to-r from-pink-500 to-red-500 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform logo-icon">
                                <span class="text-white text-lg">❤️</span>
                            </div>
                            <span class="text-xl font-bold romantic-font text-white">Registro de Amor</span>
                        </a>

                        <!-- Desktop Navigation -->
                        <div class="hidden md:ml-10 md:flex md:space-x-8">
                            <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'text-pink-400' : 'text-gray-300' }}">
                                Início
                            </a>
                            <a href="{{ route('gallery') }}" class="nav-link {{ request()->routeIs('gallery') ? 'text-pink-400' : 'text-gray-300' }}">
                                Galeria
                            </a>
                            <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'text-pink-400' : 'text-gray-300' }}">
                                Sobre
                            </a>
                            <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'text-pink-400' : 'text-gray-300' }}">
                                Contato
                            </a>
                        </div>
                    </div>

                    <!-- Right Side -->
                    <div class="flex items-center space-x-4">
                        @auth
                            <!-- User Menu -->
                            <div class="relative group user-menu">
                                <button class="flex items-center space-x-2 text-gray-300 hover:text-pink-400 transition-colors">
                                    <div class="w-8 h-8 bg-gradient-to-r from-pink-500 to-red-500 rounded-full flex items-center justify-center">
                                        <span class="text-white text-sm font-semibold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                                    </div>
                                    <span>{{ Auth::user()->name }}</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                
                                <!-- Dropdown -->
                                <div class="absolute right-0 mt-2 w-48 bg-gray-800 border border-gray-700 rounded-lg shadow-lg py-1 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 dropdown-menu">
                                    <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white">Dashboard</a>
                                    <a href="{{ route('declarations.index') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white">Minhas Declarações</a>
                                    <a href="{{ route('payment.history') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white">Pagamentos</a>
                                    <hr class="my-1 border-gray-700">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white">
                                            Sair
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-300 hover:text-pink-400 transition-colors">Entrar</a>
                            <a href="{{ route('register') }}" class="bg-gradient-to-r from-pink-500 to-red-500 text-white font-semibold px-4 py-2 rounded-full hover:from-pink-600 hover:to-red-600 transition-all duration-200 cta-button">Começar Agora</a>
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

        <!-- Footer -->
        <footer class="bg-black text-white border-t border-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div class="col-span-2">
                        <div class="flex items-center space-x-2 mb-4">
                            <div class="w-8 h-8 bg-gradient-to-r from-pink-500 to-red-500 rounded-full flex items-center justify-center">
                                <span class="text-white text-lg">❤️</span>
                            </div>
                            <span class="text-xl font-bold romantic-font">Registro de Amor</span>
                        </div>
                        <p class="text-gray-400 mb-4">
                            Eternize seu amor com uma declaração única e especial. 
                            Crie memórias que durarão para sempre.
                        </p>
                        <div class="flex space-x-4">
                            <a href="#" class="text-gray-400 hover:text-pink-400 transition-colors">
                                <span class="sr-only">Facebook</span>
                                📘
                            </a>
                            <a href="#" class="text-gray-400 hover:text-pink-400 transition-colors">
                                <span class="sr-only">Instagram</span>
                                📷
                            </a>
                            <a href="#" class="text-gray-400 hover:text-pink-400 transition-colors">
                                <span class="sr-only">Twitter</span>
                                🐦
                            </a>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-semibold mb-4">Links</h3>
                        <ul class="space-y-2">
                            <li><a href="{{ route('about') }}" class="text-gray-400 hover:text-white transition-colors">Sobre</a></li>
                            <li><a href="{{ route('contact') }}" class="text-gray-400 hover:text-white transition-colors">Contato</a></li>
                            <li><a href="{{ route('gallery') }}" class="text-gray-400 hover:text-white transition-colors">Galeria</a></li>
                        </ul>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-semibold mb-4">Legal</h3>
                        <ul class="space-y-2">
                            <li><a href="{{ route('terms') }}" class="text-gray-400 hover:text-white transition-colors">Termos de Uso</a></li>
                            <li><a href="{{ route('privacy') }}" class="text-gray-400 hover:text-white transition-colors">Privacidade</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="border-t border-gray-800 pt-8 mt-8 text-center text-gray-400">
                    <p>&copy; {{ date('Y') }} Registro de Amor. Todos os direitos reservados.</p>
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
    </style>
</body>
</html> 