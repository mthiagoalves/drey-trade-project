<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import { ref, onMounted, onUnmounted, computed } from 'vue';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';
import axios from 'axios';
import VueApexCharts from 'vue3-apexcharts'; // Importa a biblioteca de gráficos

interface CountryData { country: string; sessions: number; }
interface DailyAccessData { labels: string[]; sessions: number[]; }

const activeUsers = ref<number | string>('...');
const newUsers = ref<number | string>('...');
const avgEngagementTime = ref<string>('...');
const weeklyAccess = ref<number | string>('...');
const annualAccess = ref<number | string>('...');
const countryData = ref<CountryData[]>([]); // Para a lista de países
const dailyAccessData = ref<DailyAccessData>({ labels: [], sessions: [] });

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
        // A chamada busca todos os dados, como você já confirmou
        const response = await axios.get('/analytics-data/realtime');

        // 3. Preenchemos as variáveis com os dados recebidos
        activeUsers.value = response.data.activeUsers;
        newUsers.value = response.data.newUsers;
        avgEngagementTime.value = response.data.avgEngagementTime;
        weeklyAccess.value = response.data.weeklyAccess;
        annualAccess.value = response.data.annualAccess;
        countryData.value = response.data.countryData; // Preenche os dados dos países
        dailyAccessData.value = response.data.dailyAccess;

    } catch (e: any) {
        error.value = e.response?.data?.error || 'Ocorreu um erro ao buscar os dados.';
    } finally {
        isLoading.value = false;
    }
};

const chartSeries = computed(() => [{
    name: 'Acessos',
    data: dailyAccessData.value.sessions
}]);

onMounted(() => {
    fetchAnalyticsData();
    setInterval(fetchAnalyticsData, 60000);
});

const chartOptions = computed(() => ({
    chart: {
        type: 'area',
        height: 350,
        zoom: { enabled: false },
        toolbar: { show: false },
        foreColor: '#9CA3AF' // Cor do texto do gráfico (cinza para o modo escuro)
    },
    dataLabels: { enabled: false },
    stroke: { curve: 'smooth', width: 2 },
    colors: ['#14B8A6'], // Cor da linha do gráfico (teal)
    fill: {
        type: 'gradient',
        gradient: {
            shade: 'dark',
            opacityFrom: 0.7,
            opacityTo: 0.1,
        }
    },
    grid: {
        borderColor: '#374151', // Cor das linhas do grid
        strokeDashArray: 4
    },
    xaxis: {
        categories: dailyAccessData.value.labels,
    },
    yaxis: {
        opposite: true
    },
    tooltip: {
        theme: 'dark',
        x: { format: 'dd/MM' },
    },
}));
</script>

<template>

    <Head title="Analytics" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4 overflow-x-auto">
            <div class="grid auto-rows-min gap-4 md:grid-cols-3">
                <div
                    class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <PlaceholderPattern />

                    <div class="p-4 sm:p-6 lg:p-8">
                        <div v-if="isLoading" class="text-center text-gray-400">Carregando dados do dashboard...</div>
                        <div v-else-if="error" class="bg-red-500/10 text-red-500 p-4 rounded-lg">
                            <strong>Ocorreu um erro:</strong> {{ error }}
                        </div>

                        <div v-else class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-2">

                            <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                                <h3 class="text-sm font-medium text-gray-400">USUÁRIOS ATIVOS</h3>
                                <p class="text-3xl font-bold text-white mt-2">{{ activeUsers }}</p>
                            </div>

                        </div>
                    </div>
                </div>
                <div
                    class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <PlaceholderPattern />
                    <div class="p-4 sm:p-6 lg:p-8">
                        <div v-if="isLoading" class="text-center text-gray-400">Carregando dados do dashboard...</div>
                        <div v-else-if="error" class="bg-red-500/10 text-red-500 p-4 rounded-lg">
                            <strong>Ocorreu um erro:</strong> {{ error }}
                        </div>
                        <div v-else class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-2">
                            <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                                <h3 class="text-sm font-medium text-gray-400">NOVOS USUÁRIOS (28d)</h3>
                                <p class="text-3xl font-bold text-white mt-2">{{ newUsers }}</p>
                            </div>
                            <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                                <h3 class="text-sm font-medium text-gray-400">ACESSOS (7d)</h3>
                                <p class="text-3xl font-bold text-white mt-2">{{ weeklyAccess }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <PlaceholderPattern />
                    <div class="p-4 sm:p-6 lg:p-8">
                        <div v-if="isLoading" class="text-center text-gray-400">Carregando dados do dashboard...</div>
                        <div v-else-if="error" class="bg-red-500/10 text-red-500 p-4 rounded-lg">
                            <strong>Ocorreu um erro:</strong> {{ error }}
                        </div>
                        <div v-else class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-2">
                            <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                                <h3 class="text-sm font-medium text-gray-400">ACESSOS (ANO)</h3>
                                <p class="text-3xl font-bold text-white mt-2">{{ annualAccess }}</p>
                            </div>
                            <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                                <h3 class="text-sm font-medium text-gray-400">ENG. MÉDIO (28d)</h3>
                                <p class="text-3xl font-bold text-white mt-2">{{ avgEngagementTime }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 md:min-h-min dark:border-sidebar-border">
                <PlaceholderPattern />
                <div class="p-4 sm:p-6 lg:p-8 h-full">
                    <div v-if="isLoading" class="text-center text-gray-400">Carregando dados do dashboard...</div>
                    <div v-else-if="error" class="bg-red-500/10 text-red-500 p-4 rounded-lg">
                        <strong>Ocorreu um erro:</strong> {{ error }}
                    </div>
                    <div v-else class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-3 h-full">
                        <div class="md:col-span-2 lg:col-span-3 bg-gray-800 p-6 rounded-lg shadow-lg">
                            <h3 class="text-sm font-medium text-gray-400 mb-4">ACESSOS DIÁRIOS (ÚLTIMOS 30 DIAS)</h3>
                            <VueApexCharts type="area" height="300" :options="chartOptions" :series="chartSeries" />
                        </div>

                        <div class="lg:col-span-2 bg-gray-800 p-6 rounded-lg shadow-lg">
                            <h3 class="text-sm font-medium text-gray-400">PRINCIPAIS PAÍSES (28d)</h3>
                            <ul class="mt-4 space-y-3">
                                <li v-if="countryData.length === 0" class="text-gray-500">Nenhum dado de país
                                    disponível.</li>
                                <li v-for="country in countryData" :key="country.country"
                                    class="flex justify-between items-center text-sm">
                                    <span class="text-gray-200">{{ country.country }}</span>
                                    <span class="font-semibold text-white">{{ country.sessions }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
