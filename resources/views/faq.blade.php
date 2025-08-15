@extends('layouts.app')

@section('content')
<section class="relative min-h-screen bg-[#0B0F19] overflow-hidden">
    <!-- Floating Hearts Container -->
    <div class="floating-hearts-container z-2"></div>
    
    <!-- Floating Elements -->
    <div class="floating-elements z-3"></div>

    <!-- Hero Section -->
    <div class="relative z-10 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center" data-aos="fade-up" data-aos-duration="1000">
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-8 romantic-font">
                    <span class="relative inline-block">
                        <span class="relative z-10 text-transparent bg-clip-text bg-gradient-to-r from-pink-500 via-red-400 to-pink-500">
                            Perguntas Frequentes
                        </span>
                        <span class="absolute top-1/2 left-0 w-full h-1/3 bg-gradient-to-r from-pink-500/20 via-red-400/20 to-pink-500/20 blur-xl transform -translate-y-1/2"></span>
                    </span>
                </h1>
                <p class="text-xl text-gray-400 max-w-3xl mx-auto mb-12 leading-relaxed">
                    Tire suas dúvidas sobre nossa plataforma e descubra como eternizar seu amor de forma única e especial
                </p>
            </div>
        </div>
    </div>

    <!-- FAQ Grid -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-20">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8" x-data="{ activeTab: null }">
            @php
            $faqItems = [
                [
                    'id' => 1,
                    'question' => 'Como funciona o Registro de Amor?',
                    'answer' => 'Nossa plataforma permite que você crie uma página personalizada para expressar seu amor. Você pode adicionar fotos, mensagens especiais, músicas e muito mais para criar uma declaração única.',
                    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />'
                ],
                [
                    'id' => 2,
                    'question' => 'Por quanto tempo minha página ficará disponível?',
                    'answer' => 'Sua página ficará disponível para sempre! Uma vez criada, ela permanecerá online indefinidamente, permitindo que você e seu amor revisitem essas memórias especiais quando quiserem.',
                    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />'
                ],
                [
                    'id' => 3,
                    'question' => 'Posso editar minha página depois de criada?',
                    'answer' => 'Sim! Você pode editar sua página quantas vezes quiser. Atualize fotos, mensagens e outros elementos para manter sua declaração sempre especial e atualizada.',
                    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />'
                ],
                [
                    'id' => 4,
                    'question' => 'Como faço para compartilhar minha página?',
                    'answer' => 'Cada página tem um link único e um QR Code que você pode compartilhar facilmente. Além disso, você pode definir sua página como pública ou privada para controlar quem pode visualizá-la.',
                    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z" />'
                ],
                [
                    'id' => 5,
                    'question' => 'Quais formas de pagamento são aceitas?',
                    'answer' => 'Aceitamos diversas formas de pagamento, incluindo cartões de crédito, PIX e boleto bancário. Todas as transações são processadas de forma segura através da plataforma Stripe.',
                    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />'
                ],
                [
                    'id' => 6,
                    'question' => 'Como funciona o suporte?',
                    'answer' => 'Oferecemos suporte 24/7 através do nosso chat online e email. Nossa equipe está sempre pronta para ajudar com qualquer dúvida ou problema que você possa ter.',
                    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />'
                ]
            ];
            @endphp

            @foreach($faqItems as $item)
            <div class="faq-card-modern group" 
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
                <div class="relative p-8">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 mr-4">
                            <div class="w-12 h-12 rounded-xl bg-pink-500/10 flex items-center justify-center text-pink-500">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    {!! $item['icon'] !!}
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <button 
                                @click="activeTab = activeTab === {{ $item['id'] }} ? null : {{ $item['id'] }}"
                                class="w-full text-left flex justify-between items-center"
                            >
                                <h3 class="text-xl font-medium text-white group-hover:text-pink-400 transition-colors duration-300">
                                    {{ $item['question'] }}
                                </h3>
                                <svg 
                                    class="w-5 h-5 text-pink-500 transform transition-transform duration-300 ml-4"
                                    :class="{ 'rotate-180': activeTab === {{ $item['id'] }} }"
                                    fill="none" 
                                    stroke="currentColor" 
                                    viewBox="0 0 24 24"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>

                            <div 
                                x-show="activeTab === {{ $item['id'] }}"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 transform -translate-y-2"
                                x-transition:enter-end="opacity-100 transform translate-y-0"
                                x-transition:leave="transition ease-in duration-200"
                                x-transition:leave-start="opacity-100 transform translate-y-0"
                                x-transition:leave-end="opacity-0 transform -translate-y-2"
                                class="mt-6"
                            >
                                <div class="h-px w-full bg-gradient-to-r from-transparent via-pink-500/30 to-transparent mb-6"></div>
                                <p class="text-gray-400 leading-relaxed">
                                    {{ $item['answer'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- CTA Section -->
    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 pb-20">
        <div class="text-center">
            <p class="text-xl text-gray-400 mb-8">Ainda tem dúvidas?</p>
            <a 
                href="{{ route('contact') }}" 
                class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-pink-500 to-red-500 text-white font-medium rounded-lg hover:from-pink-600 hover:to-red-600 transition-all duration-200 transform hover:scale-105"
            >
                Entre em contato
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </a>
        </div>
    </div>
</section>

<style>
/* Floating Hearts Animation */
.floating-hearts-container {
    position: absolute;
    width: 100%;
    height: 100%;
    overflow: hidden;
    pointer-events: none;
}

.floating-hearts-container::before {
    content: '❤️';
    position: absolute;
    animation: float-hearts 20s linear infinite;
    opacity: 0.1;
    font-size: 2rem;
}

.floating-hearts-container::after {
    content: '💕';
    position: absolute;
    animation: float-hearts 15s linear infinite;
    animation-delay: -7.5s;
    opacity: 0.1;
    font-size: 2rem;
}

@keyframes float-hearts {
    0% {
        transform: translateY(100vh) translateX(-50%) rotate(0deg);
        opacity: 0;
    }
    50% {
        opacity: 0.3;
    }
    100% {
        transform: translateY(-100px) translateX(50%) rotate(360deg);
        opacity: 0;
    }
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
    width: 300px;
    height: 300px;
    border-radius: 50%;
    background: radial-gradient(circle at center, rgba(236, 72, 153, 0.1), transparent 70%);
    animation: float-elements 20s ease-in-out infinite;
}

.floating-elements::before {
    top: -150px;
    left: -150px;
}

.floating-elements::after {
    bottom: -150px;
    right: -150px;
    animation-delay: -10s;
}

@keyframes float-elements {
    0%, 100% {
        transform: translate(0, 0) rotate(0deg);
    }
    25% {
        transform: translate(100px, 100px) rotate(90deg);
    }
    50% {
        transform: translate(0, 200px) rotate(180deg);
    }
    75% {
        transform: translate(-100px, 100px) rotate(270deg);
    }
}

.faq-card-modern {
    @apply relative rounded-2xl transition-all duration-500 hover:transform hover:scale-[1.02];
}

.romantic-font {
    font-family: 'Playfair Display', serif;
}

/* Pulse Animation for Icons */
.faq-card-modern:hover .w-12 {
    animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}

@keyframes pulse {
    0%, 100% {
        opacity: 1;
        transform: scale(1);
    }
    50% {
        opacity: .8;
        transform: scale(1.1);
    }
}
</style>
@endsection 