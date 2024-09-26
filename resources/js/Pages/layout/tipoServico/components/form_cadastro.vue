<template>
    <div>
        <form @submit.prevent="submit">
            <div class="flex flex-wrap -mx-3 mb-6">

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="codigo">
                        Código
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-50 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        v-model="form.codigo" id="codigo" name="codigo" type="text" placeholder="Jane">
                    <p v-if="form.errors.codigo" class="text-red-500 text-xs italic">
                        {{ form.errors.codigo }}
                    </p>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="descricao">
                        Descrição
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-50 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        v-model="form.descricao" id="descricao" name="descricao" type="text" placeholder="Jane">
                    <p v-if="form.errors.descricao" class="text-red-500 text-xs italic">
                        {{ form.errors.descricao }}
                    </p>
                </div>
            </div>

           
            
            <div class="flex flex-wrap -mx-3 mb-2">
                <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="classificacao">
                        CLASSIFICAÇÃO
                    </label>
                    <div class="relative">
                        <input
                            class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            v-model="form.classificacao" id="classificacao" name="classificacao" type="text" :disabled="!isChecked"
                            :class="{ 'bg-gray-50': isChecked, 'bg-gray-100': !isChecked }" placeholder="Doe">
                    </div>
                        
                    
                    <p v-if="form.errors.classificacao" class="text-red-500 text-xs italic">
                        {{ form.errors.classificacao }}
                    </p>
                </div>
                <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                        Situação
                    </label>
                    <label class="flex cursor-pointer select-none items-center">
                        <div class="relative">
                            <input type="checkbox" v-model="form.situacao" id="situacao" name="situacao" class="sr-only" @change="handleCheckboxChange" />
                            <div :class="{ 'bg-gray-500': !isChecked, 'bg-[#115bee]': isChecked }"
                                class="block h-8 w-14 rounded-full transition-colors"></div>
                            <div :class="{ 'translate-x-full !bg-primary': isChecked }"
                                class="dot absolute left-1 top-1 h-6 w-6 rounded-full bg-white transition-transform">
                            </div>
                        </div>
                    </label>
                </div>
                
            </div>
            
            <div class="mb-4 px-2 my-10 pb-10 w-full text-center">
                <button type="submit" class="w-1/4 bg-blue-600 py-2 px-6 rounded-xl text-white text-xl" :disabled="form.processing">Cadastrar
                </button>
            </div>
        </form>
    </div>
</template>

<script setup>
import { useForm, router } from '@inertiajs/vue3';
import { ref, onMounted, watch } from 'vue';
import axios from 'axios';
import Swal from 'sweetalert2';

const isChecked = ref(false);
const loading = ref(false);

const handleCheckboxChange = () => {
    isChecked.value = !isChecked.value;
};

const form = useForm({
    codigo: null,
    sobrecodigo: null,
    documento: null,
    tipo: null,
    numero: null,
    data_nascimento: null,
    email: null,
});

const { cliente, errors = {} } = defineProps(['cliente', 'errors']);


const switch1 = () => {
    Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Sem código',
    });
}


const submit = () => {
    form.post('/cliente');
};

</script>

