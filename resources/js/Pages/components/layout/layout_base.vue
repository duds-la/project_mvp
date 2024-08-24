<template>

    <side_bar />
    
    <div class="w-full min-h-screen  pt-10 px-4 sm:px-6 md:px-8 lg:ps-72 bg-gray-50">
        <div class="bg-gray-200 rounded-lg p-4">
            <slot></slot>
        </div>
    </div>

</template>
<script setup>
import side_bar from "./side_bar.vue";

</script>