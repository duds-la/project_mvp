<template>
  <div class="flex justify-between">
    <side_bar @menu-fechado="handleMenuFechado" @menu-aberto="handleMenuAberto" />
    <usuario />
  </div>
  
  <div :class="sidebarClass" class="transition-all duration-500 ease-in-out">
    <div class="bg-gray-200 rounded-lg p-4">
      <slot></slot>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import side_bar from "./side_bar.vue";
import usuario from "../usuario/usuario.vue";

// Define o valor inicial da classe
const sidebarClass = ref('w-full min-h-screen pt-2 px-4 sm:px-6 md:px-8 lg:ps-72 bg-gray-50');

// Função para lidar com o evento de menu fechado
const handleMenuFechado = () => {
  sidebarClass.value = 'w-full min-h-screen pt-2 px-4 sm:px-6 md:px-8 lg:ps-28 bg-gray-50';
};

// Função para lidar com o evento de menu aberto
const handleMenuAberto = () => {
  sidebarClass.value = 'w-full min-h-screen pt-2 px-4 sm:px-6 md:px-8 lg:ps-72 bg-gray-50';
};
</script>
