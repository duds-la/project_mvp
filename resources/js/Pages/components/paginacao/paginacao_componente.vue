<template>
    <div class="flex flex-row w-full justify-end items-center space-x-4 mt-2">
        <div class="flex items-center gap-8">
            
            <button 
                :disabled="paginacao.currentPage === 1"
                @click="changePage(paginacao.prevPageUrl)"
                class="relative h-8 max-h-[32px] w-8 max-w-[32px] rounded-lg border border-gray-900 text-center align-middle text-xs font-medium text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                type="button">
                <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                    <i class="ri-arrow-left-line text-lg"></i>
                </span>
            </button>

            <p class="block text-base antialiased font-normal leading-relaxed text-gray-700">
                Página <strong class="text-gray-900">{{ paginacao.currentPage }}</strong> de
                <strong class="text-gray-900">{{ paginacao.totalPaginas }}</strong>
            </p>

            <button
                :disabled="paginacao.currentPage === paginacao.totalPaginas"
                @click="changePage(paginacao.nextPageUrl)"
                class="relative h-8 max-h-[32px] w-8 max-w-[32px] rounded-lg border border-gray-900 text-center align-middle text-xs font-medium text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                type="button">
                <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                    <i class="ri-arrow-right-line text-lg"></i>
                </span>
            </button>
        </div>
    </div>
</template>

<script setup>
import { router } from '@inertiajs/vue3';

const { paginacao } = defineProps(['paginacao']);

function changePage(Url) {
    router.get(Url)
}



</script>
