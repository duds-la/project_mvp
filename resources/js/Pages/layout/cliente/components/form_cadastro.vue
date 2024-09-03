<template>
    <div>
        <form @submit.prevent="submit">
            <div class="flex flex-wrap -mx-3 mb-6">

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-first-name">
                        {{ isChecked ? 'Nome' : 'Nome Fantasia' }}
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-50 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        v-model="form.nome" id="grid-first-name" type="text" placeholder="Jane">
                        <p v-if="errors.nome" class="text-red-500 text-xs italic">{{ errors.nome }}</p>
                </div>

                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-last-name">
                        SobreNome
                    </label>
                    <input
                        class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        v-model="form.sobrenome" id="grid-last-name" type="text" :disabled="!isChecked"
                        :class="{ 'bg-gray-50': isChecked, 'bg-gray-100': !isChecked }" placeholder="Doe">
                </div>
            </div>
            <!-- <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-password">
                        Password
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-50 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-password" type="password" placeholder="******************">
                    <p class="text-gray-600 text-xs italic">Make it as long and as crazy as you'd like</p>
                </div>
            </div> -->
            <div class="flex flex-wrap -mx-3 mb-2">
                <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                        {{ isChecked ? 'CPF' : 'CNPJ' }}
                    </label>
                    <div class="relative">
                        <!-- Input -->
                        <input type="text" id="parametro" name="parametro" v-model="form.documento"
                            class="block w-full p-4 pr-16 text-sm text-gray-900 border rounded-lg focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Pesquise Algo..." />

                        <!-- Botão de pesquisa -->
                        <button v-if="!isChecked" @click="consultaCNPJ" type="button"
                            class="absolute right-2 bottom-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 flex items-center justify-center">
                            <!-- Ícone ou spinner -->
                            <i v-if="!loading" class="ri-search-line"></i>
                            <svg v-if="loading" class="animate-spin h-5 w-5 text-white"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V2a10 10 0 00-10 10h2zm0 0a8 8 0 018 8h2a10 10 0 00-10-10v2z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                        Pessoa Física
                    </label>
                    <label class="flex cursor-pointer select-none items-center">
                        <div class="relative">
                            <input type="checkbox" v-model="form.tipo" class="sr-only" @change="handleCheckboxChange" />
                            <div :class="{ 'bg-gray-500': !isChecked, 'bg-[#115bee]': isChecked }"
                                class="block h-8 w-14 rounded-full transition-colors"></div>
                            <div :class="{ 'translate-x-full !bg-primary': isChecked }"
                                class="dot absolute left-1 top-1 h-6 w-6 rounded-full bg-white transition-transform">
                            </div>
                        </div>
                    </label>
                </div>
                <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                        Numero
                    </label>
                    <div class="relative">
                        <input
                            class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            v-model="form.numero" id="grid-last-name" type="text" :disabled="!isChecked"
                            :class="{ 'bg-gray-50': isChecked, 'bg-gray-100': !isChecked }" placeholder="Doe">
                    </div>
                </div>
                <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-zip">
                        Data nascimento
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-50 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        v-model="form.data_nascimento" id="grid-zip" type="text" placeholder="90210">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-first-name">
                        Email
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-50 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        v-model="form.email" id="grid-first-name" type="text" placeholder="Jane">
                    <!-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> -->
                </div>


            </div>
            <div class="mb-4 px-2 my-10 pb-10 w-full text-center">
                <button type="submit" class="w-1/4 bg-blue-600 py-2 px-6 rounded-xl text-white text-xl">Cadastrar
                </button>
            </div>
        </form>
    </div>
</template>
<script setup>
import { useForm, router } from '@inertiajs/vue3';
import { ref } from 'vue'
import axios from 'axios';

const isChecked = ref(false)
const loading = ref(false)

const handleCheckboxChange = () => {
    isChecked.value = !isChecked.value
}

const form = useForm({
    nome: null
    // sobrenome: null,
    // documento: null,
    // tipo: null,
    // numero: null,
    // data_nascimento: null,
    // email: null,
})

const { cliente, errors } = defineProps(['cliente', 'errors']);
console.log(errors)


function submit() {
    router.post('/cliente/', form)
}

async function consultaCNPJ() {
    loading.value = true;
    try {
        const response = await axios.get('/pesquisa-cliente/pesquisa-cliente-cnpj', { params: form });
        const data = response.data;
        form.nome = data.nome_fantasia || '123';
        console.log(response.data);
    } catch (error) {
        console.error(error);
    } finally {
        loading.value = false; // Define loading como false após a requisição terminar
    }

}
</script>
