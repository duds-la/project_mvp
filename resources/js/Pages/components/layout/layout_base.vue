<template>

    <side_bar />
    
    <div class="w-full h-screen  pt-10 px-4 sm:px-6 md:px-8 lg:ps-72 bg-blue-400">
        <slot></slot>
    </div>

</template>
<script setup>
import side_bar from "./side_bar.vue";

</script>