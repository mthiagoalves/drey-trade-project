<script setup lang="ts">
import { initFlowbite } from 'flowbite'
import { Link } from '@inertiajs/vue3';
import { ref, onMounted, onUnmounted } from 'vue';

// 1. Cria uma variável reativa para armazenar a hora atual.
const currentTime = ref('');

// Variável para guardar o ID do nosso intervalo, para que possamos limpá-lo depois.
let intervalId: number;

// 2. Função que atualiza a hora.
const updateTime = () => {
    const now = new Date();
    // Formata a data para o padrão brasileiro, mostrando horas, minutos e segundos.
    currentTime.value = now.toLocaleTimeString('pt-BR', {
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit',
        timeZone: 'America/Sao_Paulo', // Garante o fuso horário correto
    });
};

// 3. Quando o componente é "montado" (carregado na tela)...
onMounted(() => {
    updateTime(); // Atualiza a hora uma vez imediatamente.
    // ...inicia um intervalo que chama a função updateTime a cada 1000ms (1 segundo).
    intervalId = window.setInterval(updateTime, 1000);
});

// 4. Quando o componente é "desmontado" (removido da tela)...
onUnmounted(() => {
    // ...limpa o intervalo para evitar vazamentos de memória. Isso é uma boa prática.
    clearInterval(intervalId);
});

defineProps<{
    title?: string;
    description?: string;
}>();

onMounted(() => {
    initFlowbite();
})
</script>
<template>
    <MaynLayout :title="title" :description="description">
        <nav class="bg-transparent border-gray-200 dark:bg-transparent fixed w-full z-50 top-0 start-0">
            <div class="relative w-full flex flex-wrap items-center justify-between mx-auto px-8 py-6">
                <a href="https://dreytrade.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="/images/logo.png" class="h-12" alt="Drey Trade Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Drey Trade</span>
                </a>

                <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                    <!-- <button type="button"
                        class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                        id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                        data-dropdown-placement="bottom">
                        <span class="sr-only">Open user menu</span>
                        <div class="relative w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                            <svg class="absolute w-12 h-12 text-gray-400 -left-1" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </button>
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-sm dark:bg-gray-700 dark:divide-gray-600"
                        id="user-dropdown">
                        <div class="" v-if="$page.props.auth.user" :href="route('dashboard')">
                            <div class="px-4 py-3">
                                <span class="block text-sm text-gray-900 dark:text-white">User Name</span>
                                <span
                                    class="block text-sm text-gray-500 truncate dark:text-gray-400">user@email.com</span>
                            </div>
                            <ul class="py-2" aria-labelledby="user-menu-button">
                                <li><a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                                </li>
                                <li><a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
                                </li>
                                <li><a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                                        out</a></li>
                            </ul>
                        </div>
                        <template v-else>
                            <ul class="py-2" aria-labelledby="user-menu-button">
                                <li>
                                    <Link :href="route('login')"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                    Login</Link>
                                </li>
                                <li>
                                    <Link :href="route('register')"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                    Register</Link>
                                </li>
                            </ul>
                        </template>
</div>
<button data-collapse-toggle="navbar-user" type="button"
    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
    aria-controls="navbar-user" aria-expanded="false">
    <span class="sr-only">Open main menu</span>
    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M1 1h15M1 7h15M1 13h15" />
    </svg>
</button> -->
                    <div class="flex items-center text-white font-semibold text-lg">
                        {{ currentTime }}
                    </div>
                </div>

                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1 md:absolute md:top-1/2 md:left-1/2 md:-translate-x-1/2 md:-translate-y-1/2"
                    id="navbar-user">
                    <ul
                        class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700">
                        <li>
                            <Link :href="route('blog')"
                                class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#000000] md:p-0 dark:text-white md:dark:hover:text-teal-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                            Blog</Link>
                        </li>
                        <li>
                            <Link :href="route('about')"
                                class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#000000] md:p-0 dark:text-white md:dark:hover:text-teal-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                            Sobre nós</Link>
                        </li>
                        <li><a href="#"
                                class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#000000] md:p-0 dark:text-white md:dark:hover:text-teal-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contatos</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="fixed left-8 md:left-8 top-1/2 -translate-y-1/2 hidden md:flex flex-col items-center gap-8 z-40">
            <span class="text-white [writing-mode:vertical-rl] tracking-widest text-xs uppercase">Siga</span>

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
        <slot />

        <footer class="bg-white dark:bg-[#000000]">
            <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
                <div class="md:flex md:justify-between">
                    <div class="mb-6 md:mb-0">
                        <a href="https://dreytrade.com/" class="flex items-center">
                            <img src="/images/logo.png" class="h-16 me-3" alt="Drey Trade Logo" />
                            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Drey
                                Trade</span>
                        </a>
                    </div>
                    <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-2">
                        <div>
                            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Mais
                            </h2>
                            <ul class="text-gray-500 dark:text-gray-400 font-medium">
                                <li class="mb-4">
                                    <a href="https://dreytrade.com/" class="hover:underline">Drey Trade</a>
                                </li>
                                <li class="mb-4">
                                    <a href="https://dreytrade.com/" class="hover:underline">Blog</a>
                                </li>
                                <li class="mb-4">
                                    <a href="https://dreytrade.com/" class="hover:underline">Sobre Nós</a>
                                </li>
                                <li>
                                    <a href="https://tailwindcss.com/" class="hover:underline">Contato</a>
                                </li>
                            </ul>
                        </div>

                        <div>
                            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Legal</h2>
                            <ul class="text-gray-500 dark:text-gray-400 font-medium">
                                <li class="mb-4">
                                    <a href="#" class="hover:underline">Privacidade</a>
                                </li>
                                <li>
                                    <a href="#" class="hover:underline">Termos &amp; Condições</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
                <div class="sm:flex sm:items-center sm:justify-between">
                    <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2025 <a
                            href="https://dreytrade.com/" class="hover:underline">Drey Trade</a>. All Rights Reserved.
                    </span>
                    <div class="flex mt-4 sm:justify-center sm:mt-0">
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 8 19">
                                <path fill-rule="evenodd"
                                    d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">Facebook page</span>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                            </svg>
                            <span class="sr-only">Discord community</span>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 17">
                                <path fill-rule="evenodd"
                                    d="M20 1.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.344 8.344 0 0 1-2.605.98A4.13 4.13 0 0 0 13.85 0a4.068 4.068 0 0 0-4.1 4.038 4 4 0 0 0 .105.919A11.705 11.705 0 0 1 1.4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 4.1 9.635a4.19 4.19 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 0 14.184 11.732 11.732 0 0 0 6.291 16 11.502 11.502 0 0 0 17.964 4.5c0-.177 0-.35-.012-.523A8.143 8.143 0 0 0 20 1.892Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">Twitter page</span>
                        </a>

                    </div>
                </div>
            </div>
        </footer>
    </MaynLayout>
</template>
