@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative min-h-screen bg-gray-900 overflow-hidden">
    <!-- Grid Background -->
    <div class="absolute inset-0 bg-grid-pattern opacity-5 z-1"></div>
    
    <!-- Floating Hearts Container -->
    <div class="floating-hearts-container z-2"></div>
    
    <!-- Floating Elements -->
    <div class="floating-elements z-3"></div>
    
    <!-- Hero Content with 3D Transform -->
    <div class="relative z-10 min-h-screen flex items-center" id="hero-content">
        <div class="max-w-8xl mx-auto px-8 lg:px-16 xl:px-20">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <!-- Left Content -->
                <div class="lg:col-span-6 text-white" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="300">
                    <div class="mb-8">
                        <h1 class="hero-title text-5xl md:text-7xl lg:text-8xl font-bold mb-6 leading-tight">
                            <span class="word-1 block text-white opacity-0 glitch-effect">Declare</span>
                            <span class="word-2 block text-transparent bg-clip-text bg-gradient-to-r from-pink-400 via-red-400 to-pink-600 romantic-font opacity-0 shimmer-effect">seu amor</span>
                        </h1>
                        <p class="hero-subtitle text-lg md:text-xl text-gray-300 mb-8 leading-relaxed max-w-xl opacity-0">
                            Crie uma página personalizada para quem você ama e 
                            surpreenda a pessoa com uma declaração especial que ficará 
                            para sempre.
                        </p>
                    </div>

                    <!-- CTA Button with Morphing Effect -->
                    <div class="hero-cta mb-12 opacity-0" data-aos="zoom-in" data-aos-delay="800">
                        <a href="{{ route('register') }}" class="morphing-button group relative inline-flex items-center justify-center px-8 py-4 text-lg font-semibold text-white bg-gradient-to-r from-pink-500 to-red-500 rounded-2xl hover:from-pink-600 hover:to-red-600 transition-all duration-300 shadow-2xl hover:shadow-pink-500/25 transform hover:scale-105 hover:-translate-y-1 overflow-hidden">
                            <span class="button-bg absolute inset-0 bg-gradient-to-r from-purple-600 to-pink-600 opacity-0 transition-opacity duration-500"></span>
                            <span class="relative z-10 mr-3 text-xl pulse-heart">💖</span>
                            <span class="relative z-10">Criar minha página</span>
                            <span class="relative z-10 ml-3 transform group-hover:translate-x-2 transition-transform text-lg floating-arrow">→</span>
                        </a>
                    </div>

                    <!-- Social Proof with Floating Animation -->
                    <div class="hero-social-proof flex items-center space-x-4 opacity-0" data-aos="fade-up" data-aos-delay="1000">
                        <div class="flex -space-x-2">
                            <div class="w-10 h-10 bg-gradient-to-r from-pink-400 to-red-400 rounded-full border-2 border-gray-800 flex items-center justify-center floating-avatar" style="animation-delay: 0s">
                                <span class="text-white font-bold text-sm">M</span>
                            </div>
                            <div class="w-10 h-10 bg-gradient-to-r from-purple-400 to-pink-400 rounded-full border-2 border-gray-800 flex items-center justify-center floating-avatar" style="animation-delay: 0.2s">
                                <span class="text-white font-bold text-sm">A</span>
                            </div>
                            <div class="w-10 h-10 bg-gradient-to-r from-red-400 to-pink-400 rounded-full border-2 border-gray-800 flex items-center justify-center floating-avatar" style="animation-delay: 0.4s">
                                <span class="text-white font-bold text-sm">L</span>
                            </div>
                            <div class="w-10 h-10 bg-gradient-to-r from-pink-400 to-purple-400 rounded-full border-2 border-gray-800 flex items-center justify-center floating-avatar" style="animation-delay: 0.6s">
                                <span class="text-white font-bold text-sm">+</span>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-center text-yellow-400 mb-1 star-glow">
                                <span class="star-glow">⭐</span>
                                <span class="star-glow">⭐</span>
                                <span class="star-glow">⭐</span>
                                <span class="star-glow">⭐</span>
                                <span class="star-glow">⭐</span>
                            </div>
                            <div class="text-gray-400 font-medium text-sm counter-animation">Mais de <span class="count-up">40325</span> usuários satisfeitos</div>
                        </div>
                    </div>
                </div>

                <!-- Right Content - Phone Mockup with 3D Effect -->
                <div class="lg:col-span-6 relative" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="500">
                    <div class="relative max-w-sm mx-auto phone-3d-container">
                        <div class="phone-mockup-modern opacity-0 phone-3d-effect">
                            <div class="phone-screen-modern">
                                <div class="mockup-content-modern">
                                    <div class="mockup-header-modern opacity-0">
                                        <div class="mockup-avatar-modern pulsing-avatar"></div>
                                        <div class="mockup-names-modern">Paulo & Carla</div>
                                        <div class="mockup-status">💕 Há 2 anos juntos</div>
                                    </div>
                                    <div class="mockup-image-modern opacity-0 image-hover-effect"></div>
                                    <div class="mockup-message-modern opacity-0">
                                        "A vida fica mais bonita a cada certeza que você 
                                        é o amor da minha vida. Obrigada por 
                                        compartilhar a vida comigo, por me apoiar e me 
                                        ajudar a levar tudo de uma forma mais leve."
                                    </div>
                                    <div class="mockup-actions opacity-0">
                                        <div class="mockup-heart-btn interactive-heart">💕 457</div>
                                        <div class="mockup-share-btn">📤 Compartilhar</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Enhanced Decorative elements -->
                        <div class="absolute -top-10 -right-10 w-20 h-20 bg-pink-500/20 rounded-full blur-xl floating-orb"></div>
                        <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-red-500/20 rounded-full blur-xl floating-orb" style="animation-delay: 2s"></div>
                        <div class="absolute top-1/2 -right-5 w-4 h-4 bg-pink-400 rounded-full sparkle"></div>
                        <div class="absolute bottom-1/4 -left-3 w-3 h-3 bg-purple-400 rounded-full sparkle" style="animation-delay: 1s"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How it Works Section -->
<section class="step-section py-20 bg-gray-900 relative">
    <div class="absolute inset-0 bg-grid-pattern opacity-3"></div>
    <div class="relative z-10 max-w-8xl mx-auto px-8 lg:px-16 xl:px-20">
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="1000">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-8 romantic-font wave-text">
                Crie sua página em poucos passos
            </h2>
            <p class="text-lg md:text-xl text-gray-400 max-w-4xl mx-auto">
                Personalize uma página especial para surpreender alguém querido. O processo é 
                simples e rápido.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-8">
            <!-- Step 1 -->
            <div class="step-card group step-animation-1" data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">
                <div class="step-number">
                    <div class="number-circle magnetic-effect pulse-number">1</div>
                    <div class="step-connector animated-line flowing-line"></div>
                </div>
                <div class="step-icon bounce-icon glow-icon">
                    <svg class="w-12 h-12 mx-auto text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                    </svg>
                </div>
                <h3 class="step-title animated-title">Personalize</h3>
                <p class="step-description fade-in-text">
                    Personalize sua página com fotos, mensagens, efeitos especiais e muito mais.
                </p>
            </div>

            <!-- Step 2 -->
            <div class="step-card group step-animation-2" data-aos="fade-up" data-aos-delay="400" data-aos-duration="800">
                <div class="step-number">
                    <div class="number-circle magnetic-effect pulse-number">2</div>
                    <div class="step-connector animated-line flowing-line"></div>
                </div>
                <div class="step-icon bounce-icon glow-icon">
                    <svg class="w-12 h-12 mx-auto text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                    </svg>
                </div>
                <h3 class="step-title animated-title">Faça o pagamento</h3>
                <p class="step-description fade-in-text">
                    Escolha seu plano preferido e faça o pagamento de forma rápida e segura.
                </p>
            </div>

            <!-- Step 3 -->
            <div class="step-card group step-animation-3" data-aos="fade-up" data-aos-delay="600" data-aos-duration="800">
                <div class="step-number">
                    <div class="number-circle magnetic-effect pulse-number">3</div>
                    <div class="step-connector animated-line flowing-line"></div>
                </div>
                <div class="step-icon bounce-icon glow-icon">
                    <svg class="w-12 h-12 mx-auto text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 7.89a2 2 0 002.83 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="step-title animated-title">Receba seu acesso</h3>
                <p class="step-description fade-in-text">
                    Você receberá por email um QR code e link para acessar sua página.
                </p>
            </div>

            <!-- Step 4 -->
            <div class="step-card group step-animation-4" data-aos="fade-up" data-aos-delay="800" data-aos-duration="800">
                <div class="step-number">
                    <div class="number-circle magnetic-effect pulse-number">4</div>
                </div>
                <div class="step-icon bounce-icon glow-icon">
                    <svg class="w-12 h-12 mx-auto text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"/>
                    </svg>
                </div>
                <h3 class="step-title animated-title">Compartilhe o amor</h3>
                <p class="step-description fade-in-text">
                    Compartilhe a página com a pessoa amada e surpreenda-a de forma especial.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="feature-section py-20 bg-black relative">
    <div class="absolute inset-0 bg-grid-pattern opacity-5"></div>
    <div class="relative z-10 max-w-8xl mx-auto px-8 lg:px-16 xl:px-20">
        <div class="text-center mb-16" data-aos="zoom-in" data-aos-duration="1000">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-8 romantic-font neon-wave">
                Recursos Exclusivos
            </h2>
            <p class="text-lg md:text-xl text-gray-400 max-w-4xl mx-auto">
                Nossa plataforma oferece recursos incríveis para você criar a página 
                personalizada perfeita
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="feature-card-modern">
                <div class="feature-icon-modern hover-rotate">
                    <svg class="w-16 h-16 mx-auto text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="feature-title-modern">Contador de tempo</h3>
                <p class="feature-description-modern">
                    Dedique um contador especial. O tempo será reproduzido automaticamente na página.
                </p>
            </div>

            <!-- Feature 2 -->
            <div class="feature-card-modern">
                <div class="feature-icon-modern hover-rotate">
                    <svg class="w-16 h-16 mx-auto text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4 4 4 0 004-4V5z"/>
                    </svg>
                </div>
                <h3 class="feature-title-modern">Animações de fundo</h3>
                <p class="feature-description-modern">
                    Escolha entre várias animações incríveis. Os efeitos serão aplicados automaticamente na sua página.
                </p>
            </div>

            <!-- Feature 3 -->
            <div class="feature-card-modern">
                <div class="feature-icon-modern hover-rotate">
                    <svg class="w-16 h-16 mx-auto text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/>
                    </svg>
                </div>
                <h3 class="feature-title-modern">Música dedicada</h3>
                <p class="feature-description-modern">
                    Dedique uma música especial. A música será reproduzida automaticamente na página.
                </p>
            </div>

            <!-- Feature 4 -->
            <div class="feature-card-modern">
                <div class="feature-icon-modern hover-rotate">
                    <svg class="w-16 h-16 mx-auto text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="feature-title-modern">Em todo lugar</h3>
                <p class="feature-description-modern">
                    Crie sua página em qualquer lugar do mundo. Aceitamos todos os tipos de pagamento internacional.
                </p>
            </div>

            <!-- Feature 5 -->
            <div class="feature-card-modern">
                <div class="feature-icon-modern hover-rotate">
                    <svg class="w-16 h-16 mx-auto text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="feature-title-modern">QR Code exclusivo</h3>
                <p class="feature-description-modern">
                    Receba um QR Code único para sua página. O código será criado automaticamente para você.
                </p>
            </div>

            <!-- Feature 6 -->
            <div class="feature-card-modern">
                <div class="feature-icon-modern hover-rotate">
                    <svg class="w-16 h-16 mx-auto text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                    </svg>
                </div>
                <h3 class="feature-title-modern">URL personalizada</h3>
                <p class="feature-description-modern">
                    Ganhe uma URL personalizada única. O endereço será configurado automaticamente para sua página.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Section -->
<section class="pricing-section py-20 bg-gradient-to-br from-gray-900 to-black relative">
    <div class="absolute inset-0 bg-grid-pattern opacity-3"></div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-8 lg:px-16 xl:px-20">
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="1000">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-8 romantic-font gradient-text-animated">
                Uma <span class="text-transparent bg-clip-text bg-gradient-to-r from-pink-400 to-red-400 pulse-glow">declaração de amor</span>
            </h2>
            <p class="text-lg md:text-xl text-gray-400 max-w-3xl mx-auto mb-12">
                Escolha o plano perfeito para eternizar sua história de amor
            </p>
        </div>
        
        <!-- Grid de dois planos -->
        <div class="pricing-grid-container">
            
            <!-- Plano Anual -->
            <div class="pricing-card-modern-new pricing-card-left" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="1000">
                <div class="pricing-header-new">
                    <h3 class="plan-title-new">Mensal</h3>
                    <p class="plan-subtitle-new">Ideal para testar nossa plataforma</p>
                </div>
                
                <div class="pricing-amount-section">
                    <div class="old-price-new">R$ 39,90</div>
                    <div class="current-price-new">
                        <span class="price-symbol">R$</span>
                        <span class="price-value">19,90</span>
                        <span class="price-period">/por mês</span>
                    </div>
                </div>
                
                <div class="features-list-new">
                    <div class="feature-item-new feature-included">
                        <span class="feature-icon-check">✓</span>
                        <span>Mensagem personalizada</span>
                    </div>
                    <div class="feature-item-new feature-included">
                        <span class="feature-icon-check">✓</span>
                        <span>Contador em tempo real</span>
                    </div>
                    <div class="feature-item-new feature-included">
                        <span class="feature-icon-check">✓</span>
                        <span>Data de início</span>
                    </div>
                    <div class="feature-item-new feature-included">
                        <span class="feature-icon-check">✓</span>
                        <span>QR Code exclusivo</span>
                    </div>
                    <div class="feature-item-new feature-included">
                        <span class="feature-icon-check">✓</span>
                        <span>Máximo de 5 imagens</span>
                    </div>
                    <div class="feature-item-new feature-excluded">
                        <span class="feature-icon-cross">✗</span>
                        <span>Sem trilha sonora</span>
                    </div>
                    <div class="feature-item-new feature-excluded">
                        <span class="feature-icon-cross">✗</span>
                        <span>Sem efeitos visuais</span>
                    </div>
                    <div class="feature-item-new feature-excluded">
                        <span class="feature-icon-cross">✗</span>
                        <span>Sem animações especiais</span>
                    </div>
                    <div class="feature-item-new feature-included">
                        <span class="feature-icon-check">✓</span>
                        <span>URL personalizada</span>
                    </div>
                    <div class="feature-item-new feature-included">
                        <span class="feature-icon-check">✓</span>
                        <span>Suporte 24 horas</span>
                    </div>
                </div>
                
                <button class="cta-button-new cta-button-monthly">
                    <span>Criar minha página</span>
                    <span class="button-arrow">→</span>
                </button>
            </div>
            
            <!-- Plano Vitalício -->
            <div class="pricing-card-modern-new pricing-card-recommended pricing-card-right" data-aos="zoom-in" data-aos-delay="400" data-aos-duration="1000">
                <!-- Badge Recomendado -->
                <div class="recommended-badge">
                    <span>⭐ Mais Escolhido</span>
                </div>
                
                <div class="pricing-header-new">
                    <h3 class="plan-title-new">Vitalício</h3>
                    <p class="plan-subtitle-new">Esse plano é eterno, não precisa renovar</p>
                </div>
                
                <div class="pricing-amount-section">
                    <div class="old-price-new">R$ 59,90</div>
                    <div class="current-price-new">
                        <span class="price-symbol">R$</span>
                        <span class="price-value">29,90</span>
                        <span class="price-period">/uma vez</span>
                    </div>
                </div>
                
                <div class="features-list-new">
                    <div class="feature-item-new feature-included">
                        <span class="feature-icon-check">✓</span>
                        <span>Mensagem personalizada</span>
                    </div>
                    <div class="feature-item-new feature-included">
                        <span class="feature-icon-check">✓</span>
                        <span>Contador em tempo real</span>
                    </div>
                    <div class="feature-item-new feature-included">
                        <span class="feature-icon-check">✓</span>
                        <span>Data de início</span>
                    </div>
                    <div class="feature-item-new feature-included">
                        <span class="feature-icon-check">✓</span>
                        <span>QR Code exclusivo</span>
                    </div>
                    <div class="feature-item-new feature-included">
                        <span class="feature-icon-check">✓</span>
                        <span>Máximo de 12 imagens</span>
                    </div>
                    <div class="feature-item-new feature-included">
                        <span class="feature-icon-check">✓</span>
                        <span>Com trilha sonora</span>
                    </div>
                    <div class="feature-item-new feature-included">
                        <span class="feature-icon-check">✓</span>
                        <span>Efeitos visuais dinâmicos</span>
                    </div>
                    <div class="feature-item-new feature-included">
                        <span class="feature-icon-check">✓</span>
                        <span>Com animações exclusivas</span>
                    </div>
                    <div class="feature-item-new feature-included">
                        <span class="feature-icon-check">✓</span>
                        <span>URL personalizada</span>
                    </div>
                    <div class="feature-item-new feature-included">
                        <span class="feature-icon-check">✓</span>
                        <span>Suporte 24 horas</span>
                    </div>
                </div>
                
                <button class="cta-button-new cta-button-lifetime">
                    <span>Criar minha página</span>
                    <span class="button-arrow">→</span>
                </button>
            </div>
            
        </div>
        
        <!-- Garantia e Informações Extras -->
        <div class="text-center mt-12" data-aos="fade-up" data-aos-delay="1200">
            <div class="inline-flex items-center space-x-6 text-gray-400">
                <div class="flex items-center space-x-2">
                    <span class="text-green-400">🔒</span>
                    <span>Pagamento 100% Seguro</span>
                </div>
                <div class="flex items-center space-x-2">
                    <span class="text-blue-400">⚡</span>
                    <span>Ativação Instantânea</span>
                </div>
                <div class="flex items-center space-x-2">
                    <span class="text-pink-400">💝</span>
                    <span>Sem Mensalidades</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Final -->
<section class="py-20 bg-gradient-to-r from-pink-600 via-red-500 to-pink-600 text-white text-center relative overflow-hidden final-cta-section">
    <div class="absolute inset-0 bg-black opacity-20"></div>
    <div class="absolute inset-0 bg-grid-pattern opacity-10"></div>
    
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="floating-element-cta floating-element-1"></div>
        <div class="floating-element-cta floating-element-2"></div>
        <div class="floating-element-cta floating-element-3"></div>
    </div>
    
    <div class="relative z-10 max-w-6xl mx-auto px-8 lg:px-16 xl:px-20">
        <h2 class="text-4xl md:text-5xl font-bold mb-8 romantic-font text-glow" data-aos="fade-down" data-aos-duration="1000">
            Pronto para eternizar seu amor?
        </h2>
        <p class="text-lg md:text-xl mb-12 opacity-90 max-w-3xl mx-auto typewriter-final" data-aos="fade-up" data-aos-delay="300">
            Mais de <span class="count-up-final">1000</span> casais já criaram suas declarações únicas. 
            Seja o próximo a eternizar sua história de amor!
        </p>
        <a href="{{ route('register') }}" class="inline-block bg-white text-red-600 font-semibold py-4 px-8 rounded-2xl hover:bg-gray-100 transition-all duration-200 shadow-2xl transform hover:scale-105 hover:-translate-y-1 text-lg final-cta-button" data-aos="zoom-in" data-aos-delay="600">
            <span class="button-heart">❤️</span> Criar Minha Declaração Agora
        </a>
    </div>
</section>
@endsection

@push('head')
<style>
/* Garantir que elementos apareçam inicialmente */
body {
    opacity: 1 !important;
}

.hero-title .word-1,
.hero-title .word-2,
.hero-subtitle,
.hero-cta,
.hero-social-proof,
.phone-mockup-modern,
.mockup-header-modern,
.mockup-image-modern,
.mockup-message-modern,
.mockup-actions,
.price-amount-modern {
    opacity: 1 !important;
}

/* Step cards devem aparecer por padrão */
.step-card {
    opacity: 1;
    transform: translateY(0);
}

/* Feature cards devem aparecer por padrão */
.feature-card-modern {
    opacity: 1;
    transform: translateY(0);
}

.feature-item-modern {
    opacity: 1;
    transform: translateX(0);
}

/* Custom max-width for wider layout */
.max-w-8xl {
    max-width: 88rem; /* 1408px */
}

/* Grid Background Pattern */
.bg-grid-pattern {
    background-image: 
        linear-gradient(rgba(255, 255, 255, 0.1) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255, 255, 255, 0.1) 1px, transparent 1px);
    background-size: 50px 50px;
}

/* Z-index layers */
.z-0 { z-index: 0; }
.z-1 { z-index: 1; }
.z-2 { z-index: 2; }
.z-3 { z-index: 3; }

/* Efeito de texto Glitch */
.glitch-effect {
    position: relative;
    animation: glitch 2s infinite;
}

.glitch-effect::before,
.glitch-effect::after {
    content: attr(data-text);
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

.glitch-effect::before {
    animation: glitch-1 0.5s infinite;
    color: #ff0040;
    z-index: -1;
}

.glitch-effect::after {
    animation: glitch-2 0.5s infinite;
    color: #00ffff;
    z-index: -2;
}

@keyframes glitch {
    0%, 100% { transform: translate(0); }
    20% { transform: translate(-2px, 2px); }
    40% { transform: translate(-2px, -2px); }
    60% { transform: translate(2px, 2px); }
    80% { transform: translate(2px, -2px); }
}

@keyframes glitch-1 {
    0%, 100% { transform: translate(0); }
    20% { transform: translate(2px, -2px); }
    40% { transform: translate(-2px, 2px); }
    60% { transform: translate(-2px, -2px); }
    80% { transform: translate(2px, 2px); }
}

@keyframes glitch-2 {
    0%, 100% { transform: translate(0); }
    20% { transform: translate(-2px, 2px); }
    40% { transform: translate(2px, -2px); }
    60% { transform: translate(2px, 2px); }
    80% { transform: translate(-2px, -2px); }
}

/* Efeito Shimmer no texto */
.shimmer-effect {
    background: linear-gradient(90deg, 
        #ec4899 0%, 
        #f472b6 25%, 
        #ffffff 50%, 
        #f472b6 75%, 
        #ec4899 100%);
    background-size: 200% auto;
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: shimmer 3s linear infinite;
}

@keyframes shimmer {
    0% { background-position: 200% center; }
    100% { background-position: -200% center; }
}

/* Efeito Typewriter - Simplificado */
.typewriter-effect {
    overflow: hidden;
    animation: typewriter 3s steps(30, end) forwards;
}

@keyframes typewriter {
    from { 
        width: 0; 
        opacity: 0;
    }
    to { 
        width: 100%; 
        opacity: 1;
    }
}

/* Botão Morphing */
.morphing-button {
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
}

.morphing-button:hover .button-bg {
    opacity: 1;
}

.morphing-button:hover {
    transform: scale(1.05) translateY(-5px);
    box-shadow: 0 20px 40px rgba(236, 72, 153, 0.6);
}

/* Coração pulsante */
.pulse-heart {
    animation: pulse-heart 1.5s ease-in-out infinite;
}

@keyframes pulse-heart {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.2); }
}

/* Seta flutuante */
.floating-arrow {
    animation: float-arrow 2s ease-in-out infinite;
}

@keyframes float-arrow {
    0%, 100% { transform: translateX(0); }
    50% { transform: translateX(10px); }
}

/* Avatares flutuantes */
.floating-avatar {
    animation: float-gentle-avatar 3s ease-in-out infinite;
}

@keyframes float-gentle-avatar {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}

/* Estrelas brilhantes */
.star-glow {
    animation: star-glow 2s ease-in-out infinite;
}

@keyframes star-glow {
    0%, 100% { 
        filter: brightness(1) drop-shadow(0 0 5px #fbbf24);
        transform: scale(1);
    }
    50% { 
        filter: brightness(1.5) drop-shadow(0 0 15px #fbbf24);
        transform: scale(1.1);
    }
}

/* Contador animado */
.count-up {
    font-weight: bold;
    color: #ec4899;
}

/* Telefone 3D */
.phone-3d-container {
    perspective: 1000px;
}

.phone-3d-effect {
    transform-style: preserve-3d;
    transition: transform 0.6s;
}

.phone-3d-effect:hover {
    transform: rotateY(-15deg) rotateX(10deg);
}

/* Avatar pulsante */
.pulsing-avatar {
    animation: pulse-avatar 2s ease-in-out infinite;
}

@keyframes pulse-avatar {
    0%, 100% { 
        transform: scale(1);
        box-shadow: 0 0 0 0 rgba(236, 72, 153, 0.7);
    }
    50% { 
        transform: scale(1.05);
        box-shadow: 0 0 0 10px rgba(236, 72, 153, 0);
    }
}

/* Imagem com hover effect */
.image-hover-effect {
    transition: all 0.3s ease;
}

.image-hover-effect:hover {
    transform: scale(1.05);
    filter: brightness(1.2);
}

/* Coração interativo */
.interactive-heart {
    cursor: pointer;
    transition: all 0.3s ease;
}

.interactive-heart:hover {
    transform: scale(1.2);
    color: #ff1744;
}

/* Orbes flutuantes */
.floating-orb {
    animation: float-orb 4s ease-in-out infinite;
}

@keyframes float-orb {
    0%, 100% { 
        transform: translateY(0px) scale(1);
        opacity: 0.3;
    }
    50% { 
        transform: translateY(-20px) scale(1.1);
        opacity: 0.6;
    }
}

/* Sparkles */
.sparkle {
    animation: sparkle 1.5s ease-in-out infinite;
}

@keyframes sparkle {
    0%, 100% { 
        opacity: 0;
        transform: scale(0);
    }
    50% { 
        opacity: 1;
        transform: scale(1);
    }
}

/* Texto Wave */
.wave-text {
    background: linear-gradient(-45deg, #ec4899, #f472b6, #ec4899, #f472b6);
    background-size: 400% 400%;
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: wave-gradient 4s ease infinite;
}

@keyframes wave-gradient {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* Números magnéticos */
.magnetic-effect {
    transition: all 0.3s ease;
}

.magnetic-effect:hover {
    transform: scale(1.1);
    box-shadow: 0 15px 35px rgba(236, 72, 153, 0.4);
}

/* Linha animada */
.animated-line {
    background: linear-gradient(90deg, transparent, #ec4899, transparent);
    animation: line-flow 2s ease-in-out infinite;
}

@keyframes line-flow {
    0%, 100% { transform: translateX(-100%); }
    50% { transform: translateX(100%); }
}

/* Ícones saltitantes */
.bounce-icon {
    animation: bounce-icon 2s ease-in-out infinite;
}

@keyframes bounce-icon {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

/* Texto Rainbow */
.rainbow-text {
    background: linear-gradient(45deg, #ff0080, #ff8c00, #40e0d0, #ff0080);
    background-size: 400% 400%;
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: rainbow 3s ease infinite;
}

@keyframes rainbow {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* Cards com efeito Tilt 3D - apenas para feature cards */
.feature-card-modern.tilt-card {
    transition: transform 0.3s ease;
    transform-style: preserve-3d;
}

.feature-card-modern.tilt-card:hover {
    transform: perspective(1000px) rotateX(10deg) rotateY(10deg);
}

/* Outros cards tilt (step cards) - efeito diferente */
.step-card.tilt-card {
    transition: transform 0.3s ease;
}

.step-card.tilt-card:hover {
    transform: translateY(-10px);
}

/* Ícones rotativos */
.hover-rotate {
    transition: transform 0.3s ease;
}

.hover-rotate:hover {
    transform: rotate(15deg) scale(1.1);
}

/* Garantir que TODOS os ícones dos feature cards tenham animação */
.feature-card-modern .hover-rotate:hover {
    transform: rotate(15deg) scale(1.1) !important;
    transition: transform 0.3s ease !important;
}

/* Gradient text animado */
.gradient-text-animated {
    background: linear-gradient(45deg, #ec4899, #f472b6, #ef4444, #ec4899);
    background-size: 400% 400%;
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: gradient-shift 3s ease infinite;
}

@keyframes gradient-shift {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* Pulse Glow */
.pulse-glow {
    animation: pulse-glow 2s ease-in-out infinite;
}

@keyframes pulse-glow {
    0%, 100% { 
        filter: drop-shadow(0 0 5px #ec4899);
    }
    50% { 
        filter: drop-shadow(0 0 20px #ec4899) drop-shadow(0 0 30px #f472b6);
    }
}

/* Card 3D Hover */
.card-hover-3d {
    transition: transform 0.6s ease;
    transform-style: preserve-3d;
}

.card-hover-3d:hover {
    transform: perspective(1000px) rotateX(5deg) rotateY(5deg) scale(1.02);
}

/* Check animado */
.animated-check {
    display: inline-block;
    animation: check-bounce 0.6s ease forwards;
}

@keyframes check-bounce {
    0% { transform: scale(0); }
    50% { transform: scale(1.3); }
    100% { transform: scale(1); }
}

/* Botão Líquido */
.liquid-button {
    position: relative;
    overflow: hidden;
}

.button-liquid-bg {
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s ease;
}

.liquid-button:hover .button-liquid-bg {
    left: 100%;
}

/* Polaroid flutuante lento */
.floating-slow {
    animation: float-slow 6s ease-in-out infinite;
}

@keyframes float-slow {
    0%, 100% { transform: translateY(0px) rotate(-12deg); }
    50% { transform: translateY(-15px) rotate(-10deg); }
}

/* Text Glow */
.text-glow {
    text-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
    animation: text-glow-pulse 2s ease-in-out infinite;
}

@keyframes text-glow-pulse {
    0%, 100% { text-shadow: 0 0 20px rgba(255, 255, 255, 0.5); }
    50% { text-shadow: 0 0 40px rgba(255, 255, 255, 0.8), 0 0 60px rgba(236, 72, 153, 0.6); }
}

/* Floating Elements CTA */
.floating-element-cta {
    position: absolute;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
    animation: float-cta 8s ease-in-out infinite;
}

.floating-element-1 {
    width: 200px;
    height: 200px;
    top: 10%;
    left: 10%;
    animation-delay: 0s;
}

.floating-element-2 {
    width: 150px;
    height: 150px;
    top: 60%;
    right: 15%;
    animation-delay: 2s;
}

.floating-element-3 {
    width: 100px;
    height: 100px;
    bottom: 20%;
    left: 20%;
    animation-delay: 4s;
}

@keyframes float-cta {
    0%, 100% { 
        transform: translateY(0px) scale(1);
        opacity: 0.3;
    }
    50% { 
        transform: translateY(-30px) scale(1.1);
        opacity: 0.6;
    }
}

/* Count up final */
.count-up-final {
    font-weight: bold;
    color: #fbbf24;
    animation: count-glow 1s ease-in-out infinite alternate;
}

@keyframes count-glow {
    0% { color: #fbbf24; }
    100% { color: #f59e0b; text-shadow: 0 0 10px #fbbf24; }
}

/* Button Heart */
.button-heart {
    animation: button-heart-beat 1s ease-in-out infinite;
}

@keyframes button-heart-beat {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.2); }
}

/* Final CTA Button */
.final-cta-button {
    position: relative;
    overflow: hidden;
}

.final-cta-button::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(236, 72, 153, 0.3), transparent);
    transition: left 0.5s ease;
}

.final-cta-button:hover::before {
    left: 100%;
}

/* Floating Elements */
.floating-elements {
    position: absolute;
    width: 100%;
    height: 100%;
    overflow: hidden;
    pointer-events: none;
}

.floating-elements::before,
.floating-elements::after {
    content: '';
    position: absolute;
    width: 200px;
    height: 200px;
    border-radius: 50%;
    background: linear-gradient(45deg, rgba(236, 72, 153, 0.1), rgba(239, 68, 68, 0.1));
    animation: float-gentle 8s ease-in-out infinite;
}

.floating-elements::before {
    top: 20%;
    left: 10%;
    animation-delay: 0s;
}

.floating-elements::after {
    bottom: 20%;
    right: 10%;
    animation-delay: 4s;
}

@keyframes float-gentle {
    0%, 100% { 
        transform: translateY(0px) scale(1);
        opacity: 0.3;
    }
    50% { 
        transform: translateY(-20px) scale(1.1);
        opacity: 0.5;
    }
}

/* Modern Phone Mockup */
.phone-mockup-modern {
    width: 350px;
    height: 700px;
    background: linear-gradient(145deg, #1f1f1f, #0a0a0a);
    border-radius: 50px;
    padding: 10px;
    position: relative;
    box-shadow: 
        0 25px 50px rgba(0, 0, 0, 0.5),
        0 0 0 1px rgba(255, 255, 255, 0.1);
    margin: 0 auto;
}

.phone-screen-modern {
    width: 100%;
    height: 100%;
    background: linear-gradient(145deg, #111, #000);
    border-radius: 40px;
    overflow: hidden;
    position: relative;
}

.mockup-content-modern {
    padding: 50px 25px 25px;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.mockup-header-modern {
    text-align: center;
    margin-bottom: 25px;
}

.mockup-avatar-modern {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    background: linear-gradient(45deg, #ec4899, #ef4444);
    margin: 0 auto 15px;
    border: 3px solid rgba(255, 255, 255, 0.1);
}

.mockup-names-modern {
    color: white;
    font-size: 24px;
    font-weight: bold;
    font-family: 'Dancing Script', cursive;
    margin-bottom: 5px;
}

.mockup-status {
    color: #ec4899;
    font-size: 14px;
    font-weight: 500;
}

.mockup-image-modern {
    height: 250px;
    background: linear-gradient(45deg, #ec4899, #ef4444, #ec4899);
    border-radius: 20px;
    margin-bottom: 25px;
    position: relative;
}

.mockup-message-modern {
    color: #ccc;
    font-size: 16px;
    line-height: 1.6;
    text-align: center;
    flex-grow: 1;
    display: flex;
    align-items: center;
    padding: 0 10px;
}

.mockup-actions {
    display: flex;
    justify-content: space-between;
    padding: 0 10px;
}

.mockup-heart-btn,
.mockup-share-btn {
    background: rgba(236, 72, 153, 0.2);
    color: #ec4899;
    padding: 10px 15px;
    border-radius: 25px;
    font-size: 14px;
    font-weight: 500;
}

/* Step Cards */
.step-card {
    background: linear-gradient(145deg, #1a1a1a, #0d0d0d);
    border: 1px solid #333;
    border-radius: 20px;
    padding: 30px 20px;
    text-align: center;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    /* Garantir alinhamento uniforme e altura fixa */
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
    height: 350px; /* Altura fixa */
    width: 100%;
    box-sizing: border-box;
}

.step-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(236, 72, 153, 0.2);
    border-color: #ec4899;
}

.step-number {
    position: relative;
    margin-bottom: 20px;
    width: 100%;
    display: flex;
    justify-content: center;
    flex-shrink: 0; /* Não encolher */
}

.number-circle {
    width: 60px;
    height: 60px;
    background: linear-gradient(45deg, #ec4899, #ef4444);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 24px;
    font-weight: bold;
    box-shadow: 0 8px 20px rgba(236, 72, 153, 0.3);
}

.step-connector {
    position: absolute;
    top: 50%;
    right: -50px;
    width: 100px;
    height: 2px;
    background: linear-gradient(90deg, #ec4899, transparent);
    transform: translateY(-50%);
}

.step-card:last-child .step-connector {
    display: none;
}

.step-icon {
    margin-bottom: 15px;
    width: 100%;
    display: flex;
    justify-content: center;
    flex-shrink: 0; /* Não encolher */
}

.step-title {
    color: white;
    font-size: 1.3rem;
    font-weight: 600;
    margin-bottom: 12px;
    text-align: center;
    flex-shrink: 0; /* Não encolher */
}

.step-description {
    color: #9ca3af;
    line-height: 1.5;
    font-size: 0.95rem;
    text-align: center;
    flex-grow: 1; /* Cresce para preencher espaço */
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0 10px;
}

/* Feature Cards Modern - Altura fixa e alinhamento perfeito */
.feature-card-modern {
    background: linear-gradient(145deg, #1a1a1a, #0d0d0d);
    border: 1px solid #333;
    border-radius: 25px;
    padding: 40px 30px;
    text-align: center;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    transform-style: preserve-3d;
    perspective: 1000px;
    /* Garantir altura e largura fixas e alinhamento perfeito */
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
    height: 420px !important; /* Altura fixa forçada */
    width: 100% !important; /* Largura fixa forçada */
    max-width: none !important; /* Remove qualquer max-width */
    min-width: 0 !important; /* Remove qualquer min-width */
    box-sizing: border-box;
}

/* Garantir que o primeiro card tenha o mesmo tamanho */
.feature-card-modern:first-child,
.feature-card-modern:nth-child(1) {
    height: 420px !important;
    width: 100% !important;
    min-height: 420px !important;
    max-height: 420px !important;
    padding: 40px 30px !important;
    margin: 0 !important;
    border: 1px solid #333 !important;
    border-radius: 25px !important;
    background: linear-gradient(145deg, #1a1a1a, #0d0d0d) !important;
    display: flex !important;
    flex-direction: column !important;
    align-items: center !important;
    justify-content: flex-start !important;
    box-sizing: border-box !important;
    position: relative !important;
    overflow: hidden !important;
    transform: none !important;
    transition: all 0.3s ease !important;
}

.feature-card-modern:first-child .feature-icon-modern {
    height: 80px !important;
    width: 100% !important;
    margin-bottom: 25px !important;
    display: flex !important;
    justify-content: center !important;
    align-items: center !important;
    flex-shrink: 0 !important;
}

.feature-card-modern:first-child .feature-title-modern {
    height: 50px !important;
    width: 100% !important;
    margin-bottom: 20px !important;
    font-size: 1.4rem !important;
    font-weight: 600 !important;
    line-height: 1.3 !important;
    color: white !important;
    text-align: center !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    flex-shrink: 0 !important;
}

.feature-card-modern:first-child .feature-description-modern {
    height: 110px !important;
    min-height: 110px !important;
    max-height: 110px !important;
    width: 100% !important;
    padding: 15px 10px !important;
    font-size: 1rem !important;
    line-height: 1.6 !important;
    color: #9ca3af !important;
    text-align: center !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    flex-grow: 1 !important;
    margin-top: auto !important;
    margin-bottom: auto !important;
    overflow: hidden !important;
    word-wrap: break-word !important;
}

.feature-card-modern:hover {
    border-color: #ec4899;
    box-shadow: 0 25px 50px rgba(236, 72, 153, 0.3);
    /* Efeito 3D puro sem mudança de tamanho */
    transform: perspective(1000px) rotateX(10deg) rotateY(10deg) scale(1.02);
}

/* Garantir que TODOS os feature cards tenham animação hover */
.feature-card-modern:nth-child(1):hover,
.feature-card-modern:nth-child(2):hover,
.feature-card-modern:nth-child(3):hover,
.feature-card-modern:nth-child(4):hover,
.feature-card-modern:nth-child(5):hover,
.feature-card-modern:nth-child(6):hover {
    border-color: #ec4899 !important;
    box-shadow: 0 25px 50px rgba(236, 72, 153, 0.3) !important;
    transform: perspective(1000px) rotateX(10deg) rotateY(10deg) scale(1.02) !important;
    transition: all 0.3s ease !important;
}

.feature-card-modern::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #ec4899, #ef4444);
    transform: scaleX(0);
    transition: transform 0.3s ease;
}

.feature-card-modern:hover::before {
    transform: scaleX(1);
}

.feature-icon-modern {
    margin-bottom: 25px;
    display: flex;
    justify-content: center;
    width: 100%;
    flex-shrink: 0; /* Não encolher */
    height: 80px; /* Altura fixa para os ícones */
    align-items: center; /* Centralizar verticalmente */
}

.feature-title-modern {
    color: white;
    font-size: 1.4rem;
    font-weight: 600;
    margin-bottom: 20px;
    text-align: center;
    flex-shrink: 0; /* Não encolher */
    height: 50px; /* Altura fixa para títulos */
    display: flex;
    align-items: center;
    justify-content: center;
    line-height: 1.3;
}

.feature-description-modern {
    color: #9ca3af;
    line-height: 1.6;
    font-size: 1rem;
    text-align: center;
    flex-grow: 1; /* Cresce para preencher espaço */
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 15px 10px; /* Aumentei o padding vertical */
    margin-top: auto; /* Empurra para baixo */
    margin-bottom: auto; /* Centraliza verticalmente */
    height: 110px !important; /* Altura fixa exata baseada no card 3 */
    max-height: 110px !important; /* Altura máxima igual */
    min-height: 110px !important; /* Altura mínima igual */
    overflow: hidden; /* Esconder overflow se necessário */
    word-wrap: break-word; /* Quebrar palavras se necessário */
    hyphens: auto; /* Hifenização automática */
}

/* Grid containers para garantir alinhamento */
.grid {
    display: grid;
    align-items: stretch; /* Esticar cards para mesma altura */
}

/* CSS específico para o grid dos feature cards */
.feature-section .grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    align-items: stretch;
    justify-items: center;
}

/* Para telas médias e grandes, forçar 3 colunas iguais */
@media (min-width: 1280px) {
    .feature-section .grid {
        grid-template-columns: repeat(3, 1fr);
    }
    
    /* Garantir que o primeiro card tenha largura igual */
    .feature-section .grid .feature-card-modern:first-child {
        grid-column: 1;
        width: 100% !important;
        max-width: 100% !important;
    }
}

/* Para telas médias, 2 colunas iguais */
@media (min-width: 768px) and (max-width: 1279px) {
    .feature-section .grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

/* Para mobile, 1 coluna */
@media (max-width: 767px) {
    .feature-section .grid {
        grid-template-columns: 1fr;
    }
}

/* Responsividade melhorada */
@media (max-width: 1280px) {
    .step-connector {
        display: none;
    }
    
    .step-card {
        height: 320px; /* Altura menor em telas médias */
    }
    
    .feature-card-modern {
        height: 390px; /* Altura ajustada para telas médias */
    }
}

@media (max-width: 768px) {
    .phone-mockup-modern {
        width: 280px;
        height: 560px;
    }
    
    .price-amount-modern {
        font-size: 3rem;
    }
    
    .feature-card-modern,
    .step-card {
        padding: 25px 15px;
        height: 280px; /* Altura menor em mobile */
    }
    
    .feature-card-modern {
        height: 340px; /* Altura aumentada para feature cards em mobile */
    }
}

/* Floating Hearts Animation - Opacidade bem baixa */
.floating-hearts-container {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    pointer-events: none;
    z-index: 1;
}

.floating-heart {
    position: absolute;
    font-size: 60px;
    opacity: 0;
    pointer-events: none;
    animation: floatUpHeart 12s linear infinite;
    filter: drop-shadow(0 0 5px rgba(244, 114, 182, 0.2));
}

.floating-heart:nth-child(2n) {
    animation-delay: -3s;
    font-size: 65px;
}

.floating-heart:nth-child(3n) {
    animation-delay: -6s;
    font-size: 70px;
}

.floating-heart:nth-child(4n) {
    animation-delay: -9s;
    font-size: 55px;
}

@keyframes floatUpHeart {
    0% {
        transform: translateY(100vh) translateX(0) rotate(0deg) scale(0);
        opacity: 0;
    }
    10% {
        opacity: 0.1;
        transform: translateY(90vh) translateX(15px) rotate(15deg) scale(1);
    }
    50% {
        opacity: 0.15;
        transform: translateY(50vh) translateX(-10px) rotate(45deg) scale(1.1);
    }
    90% {
        opacity: 0.1;
        transform: translateY(10vh) translateX(20px) rotate(75deg) scale(1);
    }
    100% {
        transform: translateY(-10vh) translateX(0) rotate(90deg) scale(0);
        opacity: 0;
    }
}

/* Subtle pulsing animation for hearts */
@keyframes heartPulse {
    0% {
        filter: drop-shadow(0 0 15px rgba(244, 114, 182, 0.3)) brightness(1);
    }
    100% {
        filter: drop-shadow(0 0 30px rgba(244, 114, 182, 0.5)) brightness(1.2);
    }
}

/* Polaroid Decorativa */
.polaroid-svg-decoration {
    width: 550px;
    height: auto;
    opacity: 0.9;
    transform: rotate(-12deg);
    filter: brightness(0.95) contrast(1);
    transition: all 0.3s ease;
    z-index: 5;
}

.polaroid-svg-decoration:hover {
    transform: rotate(-8deg) scale(1.05);
    opacity: 1;
}

.polaroid-svg {
    width: 100%;
    height: auto;
    display: block;
}

/* Responsividade do SVG */
@media (max-width: 1280px) {
    .polaroid-svg-decoration {
        width: 450px;
    }
}

@media (max-width: 1024px) {
    .polaroid-svg-decoration {
        display: none !important;
    }
}

/* Degradê Rosa para Branco */
.pink-white-gradient {
    background: linear-gradient(45deg, #ec4899, #f472b6, #f8b4d9, #ffffff, #f8b4d9, #f472b6, #ec4899);
    background-size: 400% 400%;
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: pink-white-flow 5s ease infinite;
}

@keyframes pink-white-flow {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* Efeito Neon Suave */
.neon-soft {
    color: #f472b6;
    text-shadow: 
        0 0 5px #f472b6,
        0 0 10px #f472b6,
        0 0 15px #f472b6,
        0 0 20px #ec4899,
        0 0 35px #ec4899,
        0 0 40px #ec4899;
    animation: neon-pulse 3s ease-in-out infinite alternate;
}

@keyframes neon-pulse {
    0% {
        text-shadow: 
            0 0 5px #f472b6,
            0 0 10px #f472b6,
            0 0 15px #f472b6,
            0 0 20px #ec4899,
            0 0 35px #ec4899,
            0 0 40px #ec4899;
    }
    100% {
        text-shadow: 
            0 0 2px #f472b6,
            0 0 5px #f472b6,
            0 0 8px #f472b6,
            0 0 12px #ec4899,
            0 0 18px #ec4899,
            0 0 25px #ec4899;
    }
}

/* Grid containers para garantir alinhamento */
.grid {
    display: grid;
    align-items: stretch; /* Esticar cards para mesma altura */
}

/* Pricing Card Modern */
.pricing-card-modern-new {
    background: #1a1a1a;
    border: 1px solid #333;
    border-radius: 24px;
    padding: 32px 28px;
    position: relative;
    transition: all 0.3s ease;
    height: auto;
    min-height: 650px;
    display: flex;
    flex-direction: column;
    width: 100%;
}

.pricing-card-modern-new:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
    border-color: #444;
}

/* Card recomendado */
.pricing-card-recommended {
    border: 2px solid #e31e24;
    background: linear-gradient(135deg, #1a1a1a 0%, #2a1a1a 100%);
    position: relative;
}

.pricing-card-recommended:hover {
    border-color: #ff2d34;
    box-shadow: 0 25px 50px rgba(227, 30, 36, 0.3);
}

/* Badge recomendado */
.recommended-badge {
    position: absolute;
    top: -12px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 10;
}

.recommended-badge span {
    background: linear-gradient(135deg, #e31e24, #ff2d34);
    color: white;
    padding: 8px 20px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    box-shadow: 0 4px 12px rgba(227, 30, 36, 0.4);
}

/* Header dos planos */
.pricing-header-new {
    text-align: center;
    margin-bottom: 32px;
}

.plan-title-new {
    color: white;
    font-size: 32px;
    font-weight: bold;
    margin-bottom: 8px;
    letter-spacing: -0.5px;
}

.plan-subtitle-new {
    color: #888;
    font-size: 16px;
    line-height: 1.4;
    margin: 0;
}

/* Seção de preços */
.pricing-amount-section {
    text-align: center;
    margin-bottom: 40px;
}

.old-price-new {
    color: #666;
    font-size: 18px;
    text-decoration: line-through;
    margin-bottom: 8px;
    font-weight: 500;
}

.current-price-new {
    display: flex;
    align-items: baseline;
    justify-content: center;
    gap: 4px;
}

.price-symbol {
    color: white;
    font-size: 24px;
    font-weight: 600;
}

.price-value {
    color: white;
    font-size: 48px;
    font-weight: bold;
    line-height: 1;
}

.pricing-card-recommended .price-value {
    background: linear-gradient(135deg, #e31e24, #ff4d54);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.price-period {
    color: #888;
    font-size: 16px;
    font-weight: 500;
}

/* Lista de recursos */
.features-list-new {
    flex-grow: 1;
    margin-bottom: 32px;
}

.feature-item-new {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 16px;
    font-size: 16px;
    line-height: 1.4;
}

.feature-item-new:last-child {
    margin-bottom: 0;
}

/* Recursos incluídos */
.feature-included .feature-icon-check {
    color: #10b981;
    font-weight: bold;
    font-size: 18px;
    width: 20px;
    text-align: center;
    flex-shrink: 0;
}

.feature-included span:last-child {
    color: #e5e7eb;
}

/* Recursos excluídos */
.feature-excluded .feature-icon-cross {
    color: #ef4444;
    font-weight: bold;
    font-size: 18px;
    width: 20px;
    text-align: center;
    flex-shrink: 0;
}

.feature-excluded span:last-child {
    color: #9ca3af;
}

/* Botões CTA */
.cta-button-new {
    width: 100%;
    padding: 16px 24px;
    border-radius: 12px;
    border: none;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    position: relative;
    overflow: hidden;
}

.cta-button-monthly {
    background: #374151;
    color: white;
    border: 1px solid #4b5563;
}

.cta-button-monthly:hover {
    background: #4b5563;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(75, 85, 99, 0.4);
}

.cta-button-lifetime {
    background: linear-gradient(135deg, #e31e24, #ff2d34);
    color: white;
    box-shadow: 0 8px 20px rgba(227, 30, 36, 0.3);
}

.cta-button-lifetime:hover {
    background: linear-gradient(135deg, #ff2d34, #ff4d54);
    transform: translateY(-2px);
    box-shadow: 0 12px 30px rgba(227, 30, 36, 0.5);
}

.button-arrow {
    font-size: 18px;
    transition: transform 0.3s ease;
}

.cta-button-new:hover .button-arrow {
    transform: translateX(4px);
}

/* Responsividade */
@media (max-width: 1024px) {
    .pricing-card-modern-new {
        min-height: auto;
    }
    
    .recommended-badge {
        position: relative;
        top: 0;
        transform: none;
        margin-bottom: 20px;
        text-align: center;
    }
}

@media (max-width: 768px) {
    .pricing-card-modern-new {
        padding: 24px 20px;
        min-height: auto;
    }
    
    .plan-title-new {
        font-size: 28px;
    }
    
    .price-value {
        font-size: 40px;
    }
    
    .feature-item-new {
        font-size: 15px;
        margin-bottom: 14px;
    }
    
    .cta-button-new {
        padding: 14px 20px;
        font-size: 15px;
    }
}

/* ===========================
   NOVO SISTEMA DE PRICING CARDS
   ========================== */

/* Grid container para lado a lado */
.pricing-grid-container {
    display: flex;
    gap: 2rem;
    max-width: 1200px;
    margin: 0 auto;
    align-items: stretch;
}

.pricing-card-left,
.pricing-card-right {
    flex: 1;
    min-width: 0;
}

/* Cards principais */
.pricing-card-modern-new {
    background: #1a1a1a;
    border: 1px solid #333;
    border-radius: 24px;
    padding: 32px 28px;
    position: relative;
    transition: all 0.3s ease;
    height: auto;
    min-height: 650px;
    display: flex;
    flex-direction: column;
    width: 100%;
}

.pricing-card-modern-new:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
    border-color: #444;
}

/* Card recomendado */
.pricing-card-recommended {
    border: 2px solid #e31e24;
    background: linear-gradient(135deg, #1a1a1a 0%, #2a1a1a 100%);
    position: relative;
}

.pricing-card-recommended:hover {
    border-color: #ff2d34;
    box-shadow: 0 25px 50px rgba(227, 30, 36, 0.3);
}

/* Badge recomendado */
.recommended-badge {
    position: absolute;
    top: -12px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 10;
}

.recommended-badge span {
    background: linear-gradient(135deg, #e31e24, #ff2d34);
    color: white;
    padding: 8px 20px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    box-shadow: 0 4px 12px rgba(227, 30, 36, 0.4);
}

/* Header dos planos */
.pricing-header-new {
    text-align: center;
    margin-bottom: 32px;
}

.plan-title-new {
    color: white;
    font-size: 32px;
    font-weight: bold;
    margin-bottom: 8px;
    letter-spacing: -0.5px;
}

.plan-subtitle-new {
    color: #888;
    font-size: 16px;
    line-height: 1.4;
    margin: 0;
}

/* Seção de preços */
.pricing-amount-section {
    text-align: center;
    margin-bottom: 40px;
}

.old-price-new {
    color: #666;
    font-size: 18px;
    text-decoration: line-through;
    margin-bottom: 8px;
    font-weight: 500;
}

.current-price-new {
    display: flex;
    align-items: baseline;
    justify-content: center;
    gap: 4px;
}

.price-symbol {
    color: white;
    font-size: 24px;
    font-weight: 600;
}

.price-value {
    color: white;
    font-size: 48px;
    font-weight: bold;
    line-height: 1;
}

.pricing-card-recommended .price-value {
    background: linear-gradient(135deg, #e31e24, #ff4d54);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.price-period {
    color: #888;
    font-size: 16px;
    font-weight: 500;
}

/* Lista de recursos */
.features-list-new {
    flex-grow: 1;
    margin-bottom: 32px;
}

.feature-item-new {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 16px;
    font-size: 16px;
    line-height: 1.4;
}

.feature-item-new:last-child {
    margin-bottom: 0;
}

/* Recursos incluídos */
.feature-included .feature-icon-check {
    color: #10b981;
    font-weight: bold;
    font-size: 18px;
    width: 20px;
    text-align: center;
    flex-shrink: 0;
}

.feature-included span:last-child {
    color: #e5e7eb;
}

/* Recursos excluídos */
.feature-excluded .feature-icon-cross {
    color: #ef4444;
    font-weight: bold;
    font-size: 18px;
    width: 20px;
    text-align: center;
    flex-shrink: 0;
}

.feature-excluded span:last-child {
    color: #9ca3af;
}

/* Botões CTA */
.cta-button-new {
    width: 100%;
    padding: 16px 24px;
    border-radius: 12px;
    border: none;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    position: relative;
    overflow: hidden;
}

.cta-button-monthly {
    background: #374151;
    color: white;
    border: 1px solid #4b5563;
}

.cta-button-monthly:hover {
    background: #4b5563;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(75, 85, 99, 0.4);
}

.cta-button-lifetime {
    background: linear-gradient(135deg, #e31e24, #ff2d34);
    color: white;
    box-shadow: 0 8px 20px rgba(227, 30, 36, 0.3);
}

.cta-button-lifetime:hover {
    background: linear-gradient(135deg, #ff2d34, #ff4d54);
    transform: translateY(-2px);
    box-shadow: 0 12px 30px rgba(227, 30, 36, 0.5);
}

.button-arrow {
    font-size: 18px;
    transition: transform 0.3s ease;
}

.cta-button-new:hover .button-arrow {
    transform: translateX(4px);
}

/* Responsividade */
@media (max-width: 1024px) {
    .pricing-grid-container {
        gap: 1.5rem;
        max-width: 900px;
    }
    
    .pricing-card-modern-new {
        min-height: auto;
    }
    
    .recommended-badge {
        position: relative;
        top: 0;
        transform: none;
        margin-bottom: 20px;
        text-align: center;
    }
}

@media (max-width: 768px) {
    .pricing-grid-container {
        flex-direction: column;
        gap: 2rem;
        max-width: 500px;
    }
    
    .pricing-card-modern-new {
        padding: 24px 20px;
        min-height: auto;
        width: 100%;
    }
    
    .plan-title-new {
        font-size: 28px;
    }
    
    .price-value {
        font-size: 40px;
    }
    
    .feature-item-new {
        font-size: 15px;
        margin-bottom: 14px;
    }
    
    .cta-button-new {
        padding: 14px 20px;
        font-size: 15px;
    }
}

/* ===========================
   ANIMAÇÕES E EFEITOS
   ========================== */

/* Bounce suave para ícones */
.step-icon,
.bounce-icon {
    animation: gentle-bounce 3s ease-in-out infinite !important;
}

@keyframes gentle-bounce {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-5px); }
}

/* Efeito magnético para números */
.magnetic-effect:hover {
    transform: scale(1.05) !important;
    box-shadow: 0 12px 25px rgba(236, 72, 153, 0.4) !important;
}

/* Decoração superior do pricing card */
.pricing-card-modern::before {
    content: '' !important;
    position: absolute !important;
    top: 0 !important;
    left: 0 !important;
    right: 0 !important;
    height: 4px !important;
    background: linear-gradient(90deg, #ec4899, #ef4444, #ec4899) !important;
    border-radius: 20px 20px 0 0 !important;
}

/* Linha superior dos feature cards */
.feature-card-modern::before {
    content: '' !important;
    position: absolute !important;
    top: 0 !important;
    left: 0 !important;
    right: 0 !important;
    height: 3px !important;
    background: linear-gradient(90deg, #ec4899, #ef4444) !important;
    transform: scaleX(0) !important;
    transition: transform 0.3s ease !important;
    border-radius: 20px 20px 0 0 !important;
}

.feature-card-modern:hover::before {
    transform: scaleX(1) !important;
}

/* Remove qualquer estilo conflitante */
.grid {
    display: grid !important;
    align-items: stretch !important;
}

/* Garante que todos os elementos tenham fonte padrão */
[class*="card"] {
    font-family: inherit !important;
}

/* Cursor padrão para todos os cards */
.step-card,
.feature-card-modern,
.pricing-card-modern {
    cursor: default !important;
}

/* ===========================
   UNIFORMIZAÇÃO FINAL DOS CARDS
   ========================== */

/* Forçar altura uniforme para todos os cards */
.step-card,
.feature-card-modern {
    height: 420px !important;
    min-height: 420px !important;
    max-height: 420px !important;
}

/* Forçar elementos internos uniformes */
.step-description,
.feature-description-modern {
    height: 120px !important;
    min-height: 120px !important;
    max-height: 120px !important;
    overflow: hidden !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
}

.step-title,
.feature-title-modern {
    height: 50px !important;
    min-height: 50px !important;
    max-height: 50px !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
}

.step-icon,
.feature-icon-modern {
    height: 80px !important;
    min-height: 80px !important;
    max-height: 80px !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
}

/* OVERRIDE FINAL - Garantir que TODOS tenham mesmo tamanho */
.step-card:nth-child(1),
.step-card:nth-child(2), 
.step-card:nth-child(3),
.step-card:nth-child(4),
.feature-card-modern:nth-child(1),
.feature-card-modern:nth-child(2),
.feature-card-modern:nth-child(3),
.feature-card-modern:nth-child(4),
.feature-card-modern:nth-child(5),
.feature-card-modern:nth-child(6),
.pricing-card-modern {
    height: 420px !important;
    min-height: 420px !important;
    max-height: 420px !important;
    box-sizing: border-box !important;
}

/* ===========================
   GARANTIR VISIBILIDADE TOTAL
   ========================== */

/* Garantir que TODOS os elementos sejam visíveis */
[data-aos] {
    opacity: 1 !important;
    transform: none !important;
}

/* Elementos que devem estar sempre visíveis */
.step-card,
.feature-card-modern,
.pricing-card-modern,
.feature-item-modern,
.pricing-button-modern,
.hero-title,
.hero-subtitle,
.hero-cta,
.hero-social-proof,
.phone-mockup-modern {
    opacity: 1 !important;
    visibility: visible !important;
}

/* ===========================
   ESTILOS DOS PLANOS DE PRICING
   ========================== */

/* Plano Popular - Destaque */
.pricing-popular {
    transform: scale(1.02) !important;
    border: 2px solid #ec4899 !important;
    box-shadow: 0 25px 50px rgba(236, 72, 153, 0.4) !important;
}

/* Preços específicos dos planos */
.price-amount-modern-basic {
    font-size: 3rem !important;
    font-weight: bold !important;
    color: white !important;
    background: linear-gradient(45deg, #3b82f6, #06b6d4) !important;
    -webkit-background-clip: text !important;
    -webkit-text-fill-color: transparent !important;
    background-clip: text !important;
    line-height: 1 !important;
}

.price-amount-modern-premium {
    font-size: 3rem !important;
    font-weight: bold !important;
    color: white !important;
    background: linear-gradient(45deg, #ec4899, #ef4444) !important;
    -webkit-background-clip: text !important;
    -webkit-text-fill-color: transparent !important;
    background-clip: text !important;
    line-height: 1 !important;
}

/* Botões específicos dos planos */
.pricing-button-basic {
    width: 100% !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    
    background: linear-gradient(45deg, #3b82f6, #06b6d4) !important;
    color: white !important;
    font-weight: bold !important;
    font-size: 1.1rem !important;
    border-radius: 15px !important;
    text-decoration: none !important;
    transition: all 0.3s ease !important;
    box-shadow: 0 8px 20px rgba(59, 130, 246, 0.3) !important;
    margin-bottom: 5px !important;
    padding: 16px 24px !important;
}

.pricing-button-premium {
    width: 100% !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    
    background: linear-gradient(45deg, #ec4899, #ef4444) !important;
    color: white !important;
    font-weight: bold !important;
    font-size: 1.1rem !important;
    border-radius: 15px !important;
    text-decoration: none !important;
    transition: all 0.3s ease !important;
    box-shadow: 0 8px 20px rgba(236, 72, 153, 0.3) !important;
    margin-bottom: 5px !important;
    padding: 16px 24px !important;
}

/* Hover effects para os botões */
.pricing-button-basic:hover {
    transform: translateY(-3px) !important;
    box-shadow: 0 15px 30px rgba(59, 130, 246, 0.5) !important;
    background: linear-gradient(45deg, #2563eb, #0891b2) !important;
}

.pricing-button-premium:hover {
    transform: translateY(-3px) !important;
    box-shadow: 0 15px 30px rgba(236, 72, 153, 0.5) !important;
    background: linear-gradient(45deg, #db2777, #dc2626) !important;
}

/* Badges dos planos */
.plan-badge-basic,
.plan-badge-premium {
    display: flex !important;
    justify-content: center !important;
    align-items: center !important;
}

/* Responsividade dos planos */
@media (max-width: 1024px) {
    .pricing-popular {
        transform: none !important;
        margin-top: 2rem;
    }
    
    .grid.grid-cols-1.lg\\:grid-cols-2 {
        gap: 2rem !important;
    }
}

@media (max-width: 768px) {
    .price-amount-modern-basic,
    .price-amount-modern-premium {
        font-size: 2.5rem !important;
    }
    
    .pricing-button-basic,
    .pricing-button-premium {
        font-size: 1rem !important;
        padding: 14px 20px !important;
    }
    
    .absolute.-top-4 {
        position: relative !important;
        top: 0 !important;
        left: 0 !important;
        transform: none !important;
        margin-bottom: 1rem !important;
        display: flex !important;
        justify-content: center !important;
    }
}

/* ===========================
   ANIMAÇÕES ELABORADAS DOS STEP CARDS
   ========================== */

/* Animações sequenciais dos step cards */
.step-animation-1 {
    animation: step-entrance-1 1s ease-out forwards;
    animation-delay: 0.5s;
    opacity: 0;
    transform: translateY(50px) scale(0.9);
}

.step-animation-2 {
    animation: step-entrance-2 1s ease-out forwards;
    animation-delay: 0.8s;
    opacity: 0;
    transform: translateY(50px) scale(0.9);
}

.step-animation-3 {
    animation: step-entrance-3 1s ease-out forwards;
    animation-delay: 1.1s;
    opacity: 0;
    transform: translateY(50px) scale(0.9);
}

.step-animation-4 {
    animation: step-entrance-4 1s ease-out forwards;
    animation-delay: 1.4s;
    opacity: 0;
    transform: translateY(50px) scale(0.9);
}

@keyframes step-entrance-1 {
    0% {
        opacity: 0;
        transform: translateY(50px) scale(0.9) rotateX(-15deg);
    }
    50% {
        opacity: 0.8;
        transform: translateY(-10px) scale(1.05) rotateX(5deg);
    }
    100% {
        opacity: 1;
        transform: translateY(0) scale(1) rotateX(0deg);
    }
}

@keyframes step-entrance-2 {
    0% {
        opacity: 0;
        transform: translateY(50px) scale(0.9) rotateY(-15deg);
    }
    50% {
        opacity: 0.8;
        transform: translateY(-10px) scale(1.05) rotateY(5deg);
    }
    100% {
        opacity: 1;
        transform: translateY(0) scale(1) rotateY(0deg);
    }
}

@keyframes step-entrance-3 {
    0% {
        opacity: 0;
        transform: translateY(50px) scale(0.9) rotateX(15deg);
    }
    50% {
        opacity: 0.8;
        transform: translateY(-10px) scale(1.05) rotateX(-5deg);
    }
    100% {
        opacity: 1;
        transform: translateY(0) scale(1) rotateX(0deg);
    }
}

@keyframes step-entrance-4 {
    0% {
        opacity: 0;
        transform: translateY(50px) scale(0.9) rotateZ(-10deg);
    }
    50% {
        opacity: 0.8;
        transform: translateY(-10px) scale(1.05) rotateZ(5deg);
    }
    100% {
        opacity: 1;
        transform: translateY(0) scale(1) rotateZ(0deg);
    }
}

/* Números pulsantes com glow */
.pulse-number {
    animation: pulse-glow-number 2s ease-in-out infinite;
    position: relative;
    overflow: visible;
}

.pulse-number::before {
    content: '';
    position: absolute;
    top: -5px;
    left: -5px;
    right: -5px;
    bottom: -5px;
    background: radial-gradient(circle, rgba(236, 72, 153, 0.3), transparent 70%);
    border-radius: 50%;
    opacity: 0;
    animation: number-glow 2s ease-in-out infinite;
    z-index: -1;
}

@keyframes pulse-glow-number {
    0%, 100% {
        transform: scale(1);
        box-shadow: 0 8px 20px rgba(236, 72, 153, 0.3);
    }
    50% {
        transform: scale(1.1);
        box-shadow: 0 15px 40px rgba(236, 72, 153, 0.6);
    }
}

@keyframes number-glow {
    0%, 100% {
        opacity: 0;
        transform: scale(1);
    }
    50% {
        opacity: 1;
        transform: scale(1.2);
    }
}

/* Linha conectora fluindo */
.flowing-line {
    background: linear-gradient(90deg, 
        transparent 0%, 
        rgba(236, 72, 153, 0.3) 20%, 
        rgba(236, 72, 153, 0.8) 50%, 
        rgba(236, 72, 153, 0.3) 80%, 
        transparent 100%);
    background-size: 200% 100%;
    animation: line-flow-enhanced 3s ease-in-out infinite;
    position: relative;
    overflow: hidden;
}

.flowing-line::before {
    content: '';
    position: absolute;
    top: -1px;
    left: 0;
    right: 0;
    bottom: -1px;
    background: linear-gradient(90deg, 
        transparent 0%, 
        rgba(255, 255, 255, 0.5) 50%, 
        transparent 100%);
    background-size: 50% 100%;
    animation: sparkle-flow 2s ease-in-out infinite;
    border-radius: 2px;
}

@keyframes line-flow-enhanced {
    0%, 100% {
        background-position: -200% center;
    }
    50% {
        background-position: 200% center;
    }
}

@keyframes sparkle-flow {
    0%, 100% {
        background-position: -100% center;
        opacity: 0;
    }
    50% {
        background-position: 100% center;
        opacity: 1;
    }
}

/* Ícones com brilho */
.glow-icon {
    position: relative;
}

.glow-icon svg {
    filter: drop-shadow(0 0 8px rgba(236, 72, 153, 0.4));
    transition: all 0.3s ease;
    animation: icon-gentle-float 3s ease-in-out infinite;
}

.glow-icon:hover svg {
    filter: drop-shadow(0 0 15px rgba(236, 72, 153, 0.8));
    transform: scale(1.1) rotateY(15deg);
}

@keyframes icon-gentle-float {
    0%, 100% {
        transform: translateY(0px) rotateZ(0deg);
    }
    25% {
        transform: translateY(-3px) rotateZ(1deg);
    }
    50% {
        transform: translateY(-5px) rotateZ(0deg);
    }
    75% {
        transform: translateY(-3px) rotateZ(-1deg);
    }
}

/* Títulos animados */
.animated-title {
    animation: title-slide-in 0.8s ease-out forwards;
    animation-delay: 2s;
    opacity: 0;
    transform: translateX(-20px);
}

@keyframes title-slide-in {
    0% {
        opacity: 0;
        transform: translateX(-20px);
    }
    100% {
        opacity: 1;
        transform: translateX(0);
    }
}

/* Texto com fade-in */
.fade-in-text {
    animation: text-fade-in 1s ease-out forwards;
    animation-delay: 2.5s;
    opacity: 0;
}

@keyframes text-fade-in {
    0% {
        opacity: 0;
        transform: translateY(10px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Efeito de onda que percorre os cards */
.step-section {
    position: relative;
}

.step-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(
        ellipse 800px 200px at var(--x, 0%) var(--y, 50%),
        rgba(236, 72, 153, 0.05) 0%,
        transparent 50%
    );
    pointer-events: none;
    opacity: 0;
    animation: wave-sweep 8s ease-in-out infinite;
    animation-delay: 3s;
}

@keyframes wave-sweep {
    0%, 90%, 100% {
        opacity: 0;
        --x: -20%;
    }
    10%, 80% {
        opacity: 1;
    }
    45% {
        --x: 120%;
    }
}

/* Hover melhorado para step cards */
.step-card:hover {
    transform: translateY(-10px) scale(1.02) !important;
    box-shadow: 
        0 20px 40px rgba(236, 72, 153, 0.3),
        0 0 60px rgba(236, 72, 153, 0.1) !important;
    border-color: #ec4899 !important;
}

.step-card:hover .pulse-number {
    transform: scale(1.15);
    animation-duration: 1s;
}

.step-card:hover .glow-icon svg {
    animation-duration: 1s;
    transform: scale(1.2) rotateY(15deg);
}

/* Efeito de partículas para os numbers */
.pulse-number::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 4px;
    height: 4px;
    background: #ec4899;
    border-radius: 50%;
    transform: translate(-50%, -50%);
    animation: particle-burst 3s ease-in-out infinite;
    opacity: 0;
}

@keyframes particle-burst {
    0%, 90%, 100% {
        opacity: 0;
        transform: translate(-50%, -50%) scale(0);
    }
    10% {
        opacity: 1;
        transform: translate(-50%, -50%) scale(1);
    }
    80% {
        opacity: 0;
        transform: translate(-50%, -50%) scale(3);
    }
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
```
</script>
@endpush