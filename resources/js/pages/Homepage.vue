<script setup lang="ts">
import MainLayout from '@/layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref, onMounted, onUnmounted } from 'vue';
import Modal from '@/components/Modal.vue';
import Typed from "typed.js";

const totalSections = 5;
const activeSectionId = ref(0);
const typewriter = ref(null);

/**
 * Função para rolar suavemente até uma seção quando um item da sidebar é clicado.
 */
function scrollToSection(sectionId: number) {
    // Define a seção como ativa imediatamente para um feedback visual rápido
    activeSectionId.value = sectionId;

    // Encontra o elemento na página com o ID correspondente
    const element = document.querySelector(`#section-${sectionId}`);
    if (element) {
        element.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
}

// Variável para guardar nossa instância do Intersection Observer
let observer: IntersectionObserver;

onMounted(() => {
    // Opções para o observer: o callback será chamado quando 50% de uma seção estiver visível
    const options = {
        root: null, // null significa que o viewport é a área de observação
        threshold: 0.5,
    };

    // Cria a instância do observer
    observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            // Se a seção está visível (intersecting)
            if (entry.isIntersecting) {
                // Pega o ID do elemento (ex: "section-2") e extrai apenas o número
                const id = parseInt(entry.target.id.split('-')[1]);
                activeSectionId.value = id;
            }
        });
    }, options);

    // Começa a observar todas as seções
    const sections = document.querySelectorAll('[id^="section-"]');
    sections.forEach(section => {
        observer.observe(section);
    });

    new Typed(typewriter.value, {
        strings: [
            'DO <span class="text-red-500">CAOS</span> DAS CRIPTOS À <span class="text-green-400">CLAREZA</span> DOS DADOS'
        ],
        typeSpeed: 50, // Velocidade da digitação
        backSpeed: 30, // Velocidade ao apagar
        showCursor: false, // Cursor piscando
        loop: true
    });
});

onUnmounted(() => {
    // Limpeza: para de observar todos os elementos quando o componente é destruído
    if (observer) {
        observer.disconnect();
    }
});
</script>

<style>
.font-raster {
    font-family: 'Raster', 'Rajdhani';
}
</style>

<template>

    <Head title="Drey Trade - Crypto News" description="any description">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>
    <MainLayout>

        <div class="h-screen w-full relative" id="section-0">
            <video src="/videos/initial-banner.mp4" autoplay loop muted playsinline
                class="w-full h-full object-cover object-top">
                Seu navegador não suporta a tag de vídeo.
            </video>
            <div class="absolute inset-0 bg-gradient-to-b from-transparent from-60% to-[#0B1D26]"></div>

            <div class="absolute inset-0 flex items-end justify-start p-8 md:p-12 md:mb-16 md:ml-16 m-0 mb-14">
                <div class="w-full max-w-6xl md:px-4 p-0">

                    <h1 ref="typewriter"
                        class="text-[#006B91] text-4xl md:text-5xl font-bold leading-tight text-start [text-shadow:2px_2px_4px_rgba(0,0,0,0.5)] font-raster">
                    </h1>
                    <p class="text-gray-300 mt-5 max-w-full text-[20px]">
                        Receba análises inteligentes, em apenas uma página por semana, direto no seu e-mail.
                    </p>
                    <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                        type="button"
                        class="bg-[#006B91] text-white font-raster mt-5 cursor-pointer font-bold py-1 px-4 rounded-full text-lg uppercase tracking-wider transition duration-300 ease-in-out hover:bg-[#005a7a] focus:outline-none focus:ring-4 focus:ring-[#006B91]/50">
                        QUERO MEU ONE PAGE
                    </button>
                </div>
            </div>
            <div class="absolute inset-0 flex items-end justify-center pointer-events-none">
                <div class="w-full max-w-4xl px-4">
                    <a href="#"
                        class="mb-2 text-white mx-auto block animate-bounce w-12 h-12 p-2 rounded-full hover:bg-white/10 transition-colors pointer-events-auto">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>

                    </a>
                </div>
            </div>
        </div>
        <div class="fixed right-8 md:right-8 top-1/2 -translate-y-1/2 hidden md:flex flex-col items-end gap-8 z-40">

            <div class="flex items-center gap-4 cursor-pointer" @click="scrollToSection(0)">
                <span v-if="activeSectionId === 0" class="w-8 h-px bg-white"></span>
                <span v-else class="w-8"></span>
                <span class="[writing-mode:vertical-rl] tracking-widest text-xs uppercase"
                    :class="{ 'text-white font-bold': activeSectionId === 0, 'text-gray-400': activeSectionId !== 0 }">
                    Start
                </span>
            </div>

            <div class="flex flex-col items-center gap-4">
                <div v-for="section in totalSections" :key="section" class="flex items-center gap-4 cursor-pointer"
                    @click="scrollToSection(section)">

                    <span v-if="activeSectionId === section" class="w-8 h-px bg-white"></span>
                    <span v-else class="w-8"></span>
                    <span
                        :class="{ 'text-white font-bold': activeSectionId === section, 'text-gray-400': activeSectionId !== section }">
                        0{{ section }}
                    </span>
                </div>
            </div>
        </div>

        <div id="section-1"
            class="h-full w-full bg-[#0B1D26] flex items-center justify-center px-4 sm:px-8 lg:px-16 lg:pt-24 sm:pt-8">

            <div class="max-w-7xl w-full flex flex-col md:flex-row items-center gap-8 lg:gap-16">

                <div class="w-full md:w-1/2 relative py-8">
                    <div
                        class="absolute -top-8 -left-8 lg:-left-16 text-white/5 font-extrabold text-[12rem] lg:text-[15rem] z-0 select-none">
                        01
                    </div>

                    <div class="relative z-10">
                        <div class="flex items-center gap-4">
                            <span class="w-10 h-px bg-teal-400"></span>
                            <span class="text-teal-400 uppercase tracking-widest text-sm font-semibold">
                                AVISO IMPORTANTE
                            </span>
                        </div>

                        <h2 class="text-white text-4xl lg:text-4xl font-bold leading-tight mt-6">
                            Conteúdo 100% Educacional.
                        </h2>
                        <h2 class="text-white text-3xl lg:text-3xl font-bold leading-tight">
                            Não é recomendação de investimento.
                        </h2>

                        <p class="text-gray-300 mt-6 max-w-prose">
                            De acordo com a Resolução CVM nº 20/2021, apenas profissionais devidamente registrados como
                            analistas de valores mobiliários podem elaborar e divulgar relatórios de análise financeira.
                            Na Drey Trade, somos entusiastas do mercado cripto que unem dados, estatísticas e
                            comportamento de mercado para criar conteúdo didáticos e acessíveis. Nosso compromisso é
                            compartilhar insights educativos que ajudam você a compreender melhor esse universo, <b>sem
                                indicar compra ou venda de ativos.</b>
                        </p>

                        <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                            type="button"
                            class="inline-flex items-center gap-2 text-teal-400 mt-8 font-semibold hover:underline cursor-pointer">
                            Se increver
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="w-full md:w-1/2 h-80 md:h-[60vh]">
                    <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb"
                        alt="Pessoa em uma trilha com montanhas e um lago ao fundo"
                        class="w-full h-full object-cover rounded-lg shadow-2xl">
                </div>

            </div>
        </div>
        <div id="section-2"
            class="h-full w-full bg-[#0B1D26] flex items-center justify-center px-4 sm:px-8 lg:px-16 lg:pt-24 pt-8">

            <div class="max-w-7xl w-full flex flex-col-reverse md:flex-row items-center gap-8 lg:gap-16">
                <div class="w-full md:w-1/2 h-80 md:h-[60vh]">
                    <img src="https://images.unsplash.com/photo-1551632811-561732d1e306"
                        alt="Pessoa com mochila de trilha vermelha olhando para montanhas"
                        class="w-full h-full object-cover rounded-lg shadow-2xl">
                </div>

                <div class="w-full md:w-1/2 relative py-8">
                    <div
                        class="absolute -top-8 -left-8 lg:-left-16 text-white/5 font-extrabold text-[12rem] lg:text-[15rem] z-0 select-none">
                        02
                    </div>

                    <div class="relative z-10">
                        <div class="flex items-center gap-4">
                            <span class="w-10 h-px bg-teal-400"></span>
                            <span class="text-teal-400 uppercase tracking-widest text-sm font-semibold">
                                PERSPECTIVA E CONTEXTO
                            </span>
                        </div>

                        <h2 class="text-white text-4xl lg:text-5xl font-bold leading-tight mt-6">
                            Um olhar além do óbvio.
                        </h2>

                        <p class="text-gray-300 mt-6 max-w-prose">
                            O mercado de criptomoedas é cheio de ruídos. Por isso, vamos além da superfície: analisamos
                            dados sob ângulos não convencionais, identificando tendências, padrões e movimentos que nem
                            sempre aparecem nas análises tradicionais. Aqui, você encontra <b>contexto + visão
                                estratégica,</b>
                            para aprender a enxergar o mercado de forma diferente.
                        </p>

                        <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                            type="button"
                            class="inline-flex items-center gap-2 text-teal-400 mt-8 font-semibold hover:underline cursor-pointer">
                            Se increver
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div id="section-3"
            class="h-full w-full bg-[#0B1D26] flex items-center justify-center px-4 sm:px-8 lg:px-16 lg:py-24 py-8">

            <div class="max-w-7xl w-full flex flex-col md:flex-row items-center gap-8 lg:gap-16">

                <div class="w-full md:w-1/2 relative py-8">
                    <div
                        class="absolute -top-8 -left-8 lg:-left-16 text-white/5 font-extrabold text-[12rem] lg:text-[15rem] z-0 select-none">
                        03
                    </div>

                    <div class="relative z-10">
                        <div class="flex items-center gap-4">
                            <span class="w-10 h-px bg-teal-400"></span>
                            <span class="text-teal-400 uppercase tracking-widest text-sm font-semibold">
                                ONE PAGE SEMANAL
                            </span>
                        </div>

                        <h2 class="text-white text-4xl lg:text-5xl font-bold leading-tight mt-6">
                            O resumo que você precisa. Toda semana.
                        </h2>

                        <p class="text-gray-300 mt-6 max-w-prose">
                            Sem relatórios cansativos, sem perder tempo.
                            O One Page Drey Trade é um resumo rápido e direto, que chega toda semana no seu e-mail com
                            os principais dados, análises e insights exclusivos sobre o mercado de criptomoedas.
                            Em apenas uma página, você vai ficar por dentro do que realmente faz diferença.

                        </p>

                        <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                            type="button"
                            class="inline-flex items-center gap-2 text-teal-400 mt-8 font-semibold hover:underline cursor-pointer">
                            Cadastre-se agora e receba gratuitamente seu primeiro One Page
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="w-full md:w-1/2 h-80 md:h-[60vh]">
                    <img src="https://images.unsplash.com/photo-1473625247510-8ceb1760943f"
                        alt="Pessoa olhando um mapa com montanhas ao fundo"
                        class="w-full h-full object-cover rounded-lg shadow-2xl">
                </div>

            </div>
        </div>
        <div id="section-4"
            class="h-full w-full bg-[#0B1D26] flex items-center justify-center px-4 sm:px-8 lg:px-16 lg:pt-24 pt-8">

            <div class="max-w-7xl w-full flex flex-col-reverse md:flex-row items-center gap-8 lg:gap-16">
                <div class="w-full md:w-1/2 h-80 md:h-[60vh]">
                    <img src="https://images.unsplash.com/photo-1551632811-561732d1e306"
                        alt="Pessoa com mochila de trilha vermelha olhando para montanhas"
                        class="w-full h-full object-cover rounded-lg shadow-2xl">
                </div>

                <div class="w-full md:w-1/2 relative py-8">
                    <div
                        class="absolute -top-8 -left-8 lg:-left-16 text-white/5 font-extrabold text-[12rem] lg:text-[15rem] z-0 select-none">
                        04
                    </div>

                    <div class="relative z-10">
                        <div class="flex items-center gap-4">
                            <span class="w-10 h-px bg-teal-400"></span>
                            <span class="text-teal-400 uppercase tracking-widest text-sm font-semibold">
                                BENEFÍCIOS EM DESTAQUE (BULLET POINT – USAR ICONE DE MOEDA)
                            </span>
                        </div>

                        <h2 class="text-white text-4xl lg:text-5xl font-bold leading-tight mt-6">
                            Por que assinar o One Page Drey Trade?
                        </h2>
                        <ul class="text-gray-300 mt-6 max-w-prose space-y-3">

                            <li class="flex items-start gap-3">
                                <svg class="w-6 h-6 text-teal-400 shrink-0" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <span>Conteúdo gratuito e exclusivo</span>
                            </li>

                            <li class="flex items-start gap-3">
                                <svg class="w-6 h-6 text-teal-400 shrink-0" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <span>Resumos curtos, fáceis de entender</span>
                            </li>

                            <li class="flex items-start gap-3">
                                <svg class="w-6 h-6 text-teal-400 shrink-0" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <span>Insights baseados em dados reais</span>
                            </li>

                            <li class="flex items-start gap-3">
                                <svg class="w-6 h-6 text-teal-400 shrink-0" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <span>Uma visão estratégica além do óbvio</span>
                            </li>

                            <li class="flex items-start gap-3">
                                <svg class="w-6 h-6 text-teal-400 shrink-0" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <span>Entrega semanal no seu e-mail</span>
                            </li>

                        </ul>

                        <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                            type="button"
                            class="inline-flex items-center gap-2 text-teal-400 mt-8 font-semibold hover:underline cursor-pointer">
                            Se increver
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div id="section-5"
            class="h-full w-full bg-[#0B1D26] flex items-center justify-center px-4 sm:px-8 lg:px-16 lg:py-24 py-8">

            <div class="max-w-7xl w-full flex flex-col md:flex-row items-center gap-8 lg:gap-16">

                <div class="w-full md:w-1/2 relative py-8">
                    <div
                        class="absolute -top-8 -left-8 lg:-left-16 text-white/5 font-extrabold text-[12rem] lg:text-[15rem] z-0 select-none">
                        05
                    </div>

                    <div class="relative z-10">
                        <div class="flex items-center gap-4">
                            <span class="w-10 h-px bg-teal-400"></span>
                            <span class="text-teal-400 uppercase tracking-widest text-sm font-semibold">
                                CALL TO ACTION FINAL
                            </span>
                        </div>

                        <h2 class="text-white text-4xl lg:text-5xl font-bold leading-tight mt-6">
                            Não fique para trás no mercado cripto.
                        </h2>

                        <p class="text-gray-300 mt-6 max-w-prose">
                            A cada semana surgem novos dados, novas tendências e novos comportamentos no mercado de
                            criptomoedas.
                            Com o One Page Drey Trade, você se mantém informado, atualizado e à frente.


                        </p>

                        <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                            type="button"
                            class="inline-flex items-center gap-3 lg:text-2xl text-teal-400 mt-8 font-semibold hover:underline cursor-pointer">
                            Quero meu acesso agora
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="w-full md:w-1/2 h-80 md:h-[60vh]">
                    <img src="https://images.unsplash.com/photo-1473625247510-8ceb1760943f"
                        alt="Pessoa olhando um mapa com montanhas ao fundo"
                        class="w-full h-full object-cover rounded-lg shadow-2xl">
                </div>

            </div>
        </div>
        <Modal />
    </MainLayout>
</template>
