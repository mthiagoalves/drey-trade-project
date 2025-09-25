<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import { ref, onMounted, onUnmounted } from 'vue';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';
import axios from 'axios';

const activeUsers = ref<number | string>('...');
const isLoading = ref(true);
const error = ref<string | null>(null);

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Analytics',
        href: '/analytics',
    },
];

const fetchAnalyticsData = async () => {
    isLoading.value = true;
    error.value = null;
    try {
        const response = await axios.get('/analytics-data/realtime');
        activeUsers.value = response.data.activeUsers;
    } catch (e: any) {
        error.value = e.response?.data?.error || 'Ocorreu um erro.';
        activeUsers.value = 'N/A';
    } finally {
        isLoading.value = false;
    }
};

onMounted(() => {
    fetchAnalyticsData();
    // Atualiza os dados a cada 60 segundos
    setInterval(fetchAnalyticsData, 60000);
});
</script>

<template>

    <Head title="Analytics" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4 overflow-x-auto">
            <div class="grid auto-rows-min gap-4 md:grid-cols-3">
                <div
                    class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <PlaceholderPattern />

                    <div class="absolute inset-0 flex items-center justify-center">
                        <a :href="route('subscriptions.export')" download="inscricoes-dreytrade.csv"
                            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                            Download da Lista de E-mails
                        </a>
                    </div>
                </div>
                <div
                    class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <PlaceholderPattern />
                </div>
                <div
                    class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <PlaceholderPattern />
                </div>
            </div>
            <div
                class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 md:min-h-min dark:border-sidebar-border">
                <PlaceholderPattern />
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">USUÁRIOS ATIVOS NOS ÚLTIMOS 30
                        MINUTOS</h3>
                    <div v-if="isLoading" class="text-4xl font-bold text-gray-900 dark:text-white mt-2">
                        Carregando...
                    </div>
                    <div v-else-if="error" class="text-red-500 mt-2">
                        {{ error }}
                    </div>
                    <div v-else class="text-4xl font-bold text-gray-900 dark:text-white mt-2">
                        {{ activeUsers }}
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
