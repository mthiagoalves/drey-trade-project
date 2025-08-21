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
        </div>
    </MainLayout>
</template>
