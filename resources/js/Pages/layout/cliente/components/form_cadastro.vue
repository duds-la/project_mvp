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
                    <!-- Exibindo erro do campo nome se existir -->
                    <p v-if="form.errors.nome && form.errors.nome.length" class="text-red-500 text-xs italic">
                        {{ form.errors.nome[0] }}
                    </p>
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
import { ref } from 'vue';
import axios from 'axios';

const isChecked = ref(false);

const form = ref({
    nome: null,
    errors: {}
});

function submit() {
    axios.post('/cliente/', form.value)
        .then(response => {
            console.log('Success:', response.data);
            
            form.value.errors = {};
        })
        .catch(error => {
            console.error('Error:', error.response?.data || error.message);
            // Atualiza os erros no formulário com base na resposta do servidor
            if (error.response && error.response.data.errors) {
                // Mapeia o erro para o formato esperado
                form.value.errors = Object.fromEntries(
                    Object.entries(error.response.data.errors).map(([key, value]) => [
                        key,
                        Array.isArray(value) ? value : [value]
                    ])
                );
            } else {
                form.value.errors = { nome: ['Erro desconhecido'] }; // Mensagem genérica de erro
            }
        });
}
</script>
