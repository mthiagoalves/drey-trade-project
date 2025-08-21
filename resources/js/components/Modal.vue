<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const form = useForm({
    name: '',
    email: '',
    phone: '',
});


const formSubmitted = ref(false);

const submit = () => {
    form.post(route('subscribe'), {
        preserveScroll: true,
        onSuccess: () => {
            formSubmitted.value = true;
            form.reset();
            setTimeout(() => {
                formSubmitted.value = false;
            }, 5000);
        },
    });
};
</script>

<template>
    <!-- Main modal -->
    <div id="authentication-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <!-- Modal header -->
                <div
                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Inscrever-se
                    </h3>
                    <button type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="authentication-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <div v-if="formSubmitted"
                        class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                        role="alert">
                        Inscrição realizada com sucesso!
                    </div>
                    <form class="space-y-4" @submit.prevent="submit">
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome
                                *</label>
                            <input type="name" v-model="form.name" name="name" id="name" placeholder="Drey Trade"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required oninvalid="this.setCustomValidity('Por favor, preencha o com seu nome.')"
                                oninput="this.setCustomValidity('')" />
                            <div v-if="form.errors.name" class="text-sm text-red-500 mt-1">{{ form.errors.name }}</div>

                        </div>
                        <div>
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">E-mail *</label>
                            <input type="email" v-model="form.email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="name@dreytrade.com" required
                                oninvalid="this.setCustomValidity('Por favor, preencha o com seu e-mail.')"
                                oninput="this.setCustomValidity('')" />
                            <div v-if="form.errors.email" class="text-sm text-red-500 mt-1">{{ form.errors.email }}
                            </div>

                        </div>
                        <div>
                            <label for="phone"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefone</label>
                            <input type="tel" v-model="form.phone" name="phone" id="phone" placeholder="(11) 99999-9999"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required oninvalid="this.setCustomValidity('Por favor, preencha o com seu telefone.')"
                                oninput="this.setCustomValidity('')" />
                            <div v-if="form.errors.phone" class="text-sm text-red-500 mt-1">{{ form.errors.phone }}
                            </div>

                        </div>

                        <button type="submit" :disabled="form.processing"
                            class="w-full text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800">Inscrever</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
