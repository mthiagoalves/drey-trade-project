<script setup lang="ts">
import MainLayout from '@/layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import Typed from "typed.js";


const typewriter = ref(null);

onMounted(() => {


    new Typed(typewriter.value, {
        strings: [
            'EM <span class="text-green-400">BREVE</span>'
        ],
        typeSpeed: 80, // Velocidade da digitação
        backSpeed: 50, // Velocidade ao apagar
        showCursor: false, // Cursor piscando
        loop: true
    });
});
</script>


<style>
.font-raster {
    font-family: 'Raster', 'Rajdhani';
}
</style>
<template>

    <Head title="Blog - Drey Trade Research" description="any description">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>
    <MainLayout>

        <div class="h-screen w-full relative" id="section-0">
            <img src="/images/bannerprincipal1 (1).png" alt="Initial Banner" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent from-60% to-[#000000]"></div>

            <div class="absolute inset-0 flex items-end justify-start p-8 md:p-12 md:mb-16 md:ml-16 m-0 mb-14">
                <div class="w-full max-w-6xl md:px-4 p-0">

                    <h1 ref="typewriter"
                        class="text-white text-4xl md:text-5xl font-bold leading-tight text-start [text-shadow:2px_2px_4px_rgba(0,0,0,0.5)] font-raster">
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
    </MainLayout>
</template>
