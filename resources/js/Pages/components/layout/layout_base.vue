<template>
  <side_bar @menu-fechado="handleMenuFechado" @menu-aberto="handleMenuAberto" />

  <div :class="sidebarClass">
    <div class="bg-gray-200 rounded-lg p-4">
      <slot></slot>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import side_bar from "./side_bar.vue";

// Define o valor inicial da classe
const sidebarClass = ref('w-full min-h-screen pt-10 px-4 sm:px-6 md:px-8 lg:ps-72 bg-gray-50');

// Função para lidar com o evento de menu fechado
const handleMenuFechado = () => {
  console.log('Menu fechado event received');
  sidebarClass.value = 'w-full min-h-screen pt-10 px-4 sm:px-6 md:px-8 lg:ps-28 bg-gray-50';
};

// Função para lidar com o evento de menu aberto
const handleMenuAberto = () => {
  console.log('Menu aberto event received');
  sidebarClass.value = 'w-full min-h-screen pt-10 px-4 sm:px-6 md:px-8 lg:ps-72 bg-gray-50';
};
</script>
