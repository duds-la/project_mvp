<template lang="">
    <div>
        <form @submit.prevent="pesquisaCampo">   
            <label for="parametro" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <i class="ri-search-line text-lg text-gray-900 "></i>
                    
                </div>
                <input type="text" id="parametro" v-model="form.parametro" name="parametro" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-200 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 " placeholder="Pesquise Algo..." />

                <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">
                    Pesquisar<i class="ri-search-line ml-2"></i>
                </button>
            </div>
        </form>
    </div>
</template>

<script setup>
import { useForm, router } from '@inertiajs/vue3';

const { rota } = defineProps(['rota']);

const form = useForm({
    parametro: null,
})

function pesquisaCampo() {
    router.get(
        rota, 
        form, 
        { 
            preserveScroll: true 
        }
    )
}

</script>
