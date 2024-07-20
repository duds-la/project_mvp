<template>

    <side_bar />
    
    <div class="w-full h-screen  pt-10 px-4 sm:px-6 md:px-8 lg:ps-72 bg-blue-400">
        <div class="bg-red-400 rounded-lg">
            <slot></slot>
        </div>
    </div>

</template>
<script setup>
import side_bar from "./side_bar.vue";

</script>