<script setup lang="ts">
import MainLayout from '@/layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>

    <Head title="Blog - Drey Trade" description="any description">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>
    <MainLayout>

        <div class="h-screen w-full relative" id="section-0">
            <img src="/images/initial-banner-gpt.png" alt="Initial Banner" class="w-full h-full object-cover">

            <div class="absolute inset-0 bg-gradient-to-b from-transparent from-60% to-[#0B1D26]"></div>

            <div class="absolute inset-0 flex items-center justify-center">

                <div class="w-full max-w-4xl px-4">

                    <div class="flex items-center justify-start mb-4">
                        <span class="w-16 h-px bg-teal-400"></span>
                        <p class="text-teal-400 uppercase tracking-widest text-sm font-semibold ml-3">
                            Blog
                        </p>
                    </div>

                    <h1 class="font-serif text-white text-5xl md:text-7xl font-bold leading-tight text-start">
                        Em breve...
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
