<template>
    <div>
        <a @click="voltar" class="bg-blue-700 p-3 rounded-xl text-lg text-white font-normal 
        tracking-wide hover:bg-blue-800 transition-colors hover:cursor-pointer">
            <i class="ri-arrow-left-double-line"></i>
        </a>
    </div>
</template>

<script setup>
import { router } from '@inertiajs/vue3';

const { rota } = defineProps(['rota']);

function voltar() {
    router.get(route(rota))
}

</script>