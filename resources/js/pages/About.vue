<script setup lang="ts">
import MainLayout from '@/layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>

    <Head title="Sobre nós - Drey Trade" description="any description">
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
                            Sobre nós
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
