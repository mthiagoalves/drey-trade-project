<script setup lang="ts">
import MainLayout from '@/layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref, onMounted, onUnmounted } from 'vue';

const totalSections = 4;
const activeSectionId = ref(0);
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
});

onUnmounted(() => {
    // Limpeza: para de observar todos os elementos quando o componente é destruído
    if (observer) {
        observer.disconnect();
    }
});
</script>

<template>

    <Head title="Drey Trade" description="any description">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>
    <MainLayout>
        <div class="fixed left-8 md:left-12 top-1/2 -translate-y-1/2 hidden md:flex flex-col items-center gap-8 z-40">
            <span class="text-white [writing-mode:vertical-rl] tracking-widest text-xs uppercase">Follow us</span>

            <a href="#" class="text-white hover:text-teal-400 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                </svg>
            </a>
            <a href="#" class="text-white hover:text-teal-400 transition-colors">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M23.954 4.569c-.885.389-1.83.654-2.825.775 1.014-.611 1.794-1.574 2.163-2.723-.951.555-2.005.959-3.127 1.184-.896-.959-2.173-1.559-3.591-1.559-2.717 0-4.92 2.203-4.92 4.917 0 .39.045.765.127 1.124C7.691 8.094 4.066 6.13 1.64 3.161c-.427.722-.666 1.561-.666 2.475 0 1.71.87 3.213 2.188 4.096-.807-.026-1.566-.248-2.228-.616v.061c0 2.385 1.693 4.374 3.946 4.827-.413.111-.849.171-1.296.171-.314 0-.615-.03-.916-.086.631 1.953 2.445 3.377 4.604 3.417-1.68 1.319-3.809 2.105-6.102 2.105-.39 0-.779-.023-1.17-.067 2.189 1.394 4.768 2.209 7.557 2.209 9.054 0 13.999-7.496 13.999-13.986 0-.21 0-.42-.015-.63.961-.689 1.799-1.56 2.46-2.548l-.047-.02z">
                    </path>
                </svg>
            </a>
        </div>
        <div class="h-screen w-full relative" id="section-0">
            <img src="/images/initial-banner-gpt.png" alt="Initial Banner" class="w-full h-full object-cover">

            <div class="absolute inset-0 bg-gradient-to-b from-transparent from-60% to-[#0B1D26]"></div>

            <div class="absolute inset-0 flex items-center justify-center">

                <div class="w-full max-w-4xl px-4">

                    <div class="flex items-center justify-start mb-4">
                        <span class="w-16 h-px bg-teal-400"></span>
                        <p class="text-teal-400 uppercase tracking-widest text-sm font-semibold ml-3">
                            Análise de Criptoativos
                        </p>
                    </div>

                    <h1 class="font-serif text-white text-5xl md:text-7xl font-bold leading-tight text-start">
                        Esteja Preparado Para o Mercado e Além
                    </h1>
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
        <div class="fixed right-8 md:right-12 top-1/2 -translate-y-1/2 hidden md:flex flex-col items-end gap-8 z-40">

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

        <div id="section-1" class="h-full w-full bg-[#0B1D26] flex items-center justify-center px-4 sm:px-8 lg:px-16 lg:pt-24 sm:pt-8">

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
                                Comece aqui
                            </span>
                        </div>

                        <h2 class="font-serif text-white text-4xl lg:text-6xl font-bold leading-tight mt-6">
                            Qual o seu nível de investidor?
                        </h2>

                        <p class="text-gray-300 mt-6 max-w-prose">
                            Determinar seu nível de conhecimento é uma ferramenta importante ao planejar futuros
                            investimentos. Este guia ajudará você a planejar suas operações de acordo com as
                            classificações de mercado: iniciante, moderado, avançado, especialista ou profissional.
                        </p>

                        <a href="#"
                            class="inline-flex items-center gap-2 text-teal-400 mt-8 font-semibold hover:underline">
                            Se increver
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="w-full md:w-1/2 h-80 md:h-[60vh]">
                    <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb"
                        alt="Pessoa em uma trilha com montanhas e um lago ao fundo"
                        class="w-full h-full object-cover rounded-lg shadow-2xl">
                </div>

            </div>
        </div>
        <div id="section-2" class="h-full w-full bg-[#0B1D26] flex items-center justify-center px-4 sm:px-8 lg:px-16 lg:pt-24 sm:pt-8">

            <div class="max-w-7xl w-full flex flex-col md:flex-row items-center gap-8 lg:gap-16">

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
                                Equipamentos Essenciais
                            </span>
                        </div>

                        <h2 class="font-serif text-white text-4xl lg:text-6xl font-bold leading-tight mt-6">
                            Escolhendo o Equipamento Certo!
                        </h2>

                        <p class="text-gray-300 mt-6 max-w-prose">
                            O bom de começar uma trilha é que você não precisa de equipamentos especiais, você
                            provavelmente já tem o que precisa. Vamos começar com as roupas. Um erro típico dos
                            iniciantes é usar jeans e roupas normais, que ficam pesadas e causam atrito quando suadas ou
                            molhadas.
                        </p>

                        <a href="#"
                            class="inline-flex items-center gap-2 text-teal-400 mt-8 font-semibold hover:underline">
                            Se increver
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div id="section-3" class="h-full w-full bg-[#0B1D26] flex items-center justify-center px-4 sm:px-8 lg:px-16 lg:pt-24 sm:pt-8">

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
                                Planeje sua Rota
                            </span>
                        </div>

                        <h2 class="font-serif text-white text-4xl lg:text-6xl font-bold leading-tight mt-6">
                            Onde Ir A Seguir?
                        </h2>

                        <p class="text-gray-300 mt-6 max-w-prose">
                            A beleza do investimento está nas inúmeras possibilidades. De ações de tecnologia a
                            commodities, escolher o próximo passo requer análise e visão. Avalie o cenário, verifique as
                            tendências e prepare-se para a jornada.
                        </p>

                        <a href="#"
                            class="inline-flex items-center gap-2 text-teal-400 mt-8 font-semibold hover:underline">
                            Se increver
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="w-full md:w-1/2 h-80 md:h-[60vh]">
                    <img src="https://images.unsplash.com/photo-1473625247510-8ceb1760943f"
                        alt="Pessoa olhando um mapa com montanhas ao fundo"
                        class="w-full h-full object-cover rounded-lg shadow-2xl">
                </div>

            </div>
        </div>
        <div id="section-4" class="h-full w-full bg-[#0B1D26] flex items-center justify-center px-4 sm:px-8 lg:px-16 lg:py-24 sm:py-8">

            <div class="max-w-7xl w-full flex flex-col md:flex-row items-center gap-8 lg:gap-16">

                <div class="w-full md:w-1/2 h-80 md:h-[60vh]">
                    <img src="https://images.unsplash.com/photo-1501555088652-021faa106b9b"
                        alt="Grupo de amigos em uma trilha de montanha"
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
                                Aproveite a Jornada
                            </span>
                        </div>

                        <h2 class="font-serif text-white text-4xl lg:text-6xl font-bold leading-tight mt-6">
                            Sozinho ou em Grupo?
                        </h2>

                        <p class="text-gray-300 mt-6 max-w-prose">
                            Assim como em uma trilha, investir pode ser uma jornada solitária ou uma experiência
                            compartilhada. Ambos os caminhos têm seus méritos. O importante é manter-se firme em sua
                            estratégia e desfrutar do crescimento e aprendizado ao longo do caminho.
                        </p>

                        <a href="#"
                            class="inline-flex items-center gap-2 text-teal-400 mt-8 font-semibold hover:underline">
                            Se increver
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>


    </MainLayout>
</template>
