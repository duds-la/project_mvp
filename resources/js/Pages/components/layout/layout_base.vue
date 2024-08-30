<template>
  <side_bar @menu-fechado="handleMenuFechado" />

  <div :class="sidebarClass">
    <div class="bg-gray-200 rounded-lg p-4">
      <slot></slot>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import side_bar from "./side_bar.vue";

// Initialize sidebar class with default value
const sidebarClass = ref('w-full min-h-screen pt-10 px-4 sm:px-6 md:px-8 lg:ps-72 bg-gray-50');

// Function to handle menu close event
const handleMenuFechado = () => {
  sidebarClass.value = 'w-full min-h-screen pt-10 px-4 sm:px-6 md:px-8 lg:ps-28 bg-gray-50';
  console.log('Menu fechado event received', sidebarClass.value);
};
</script>
