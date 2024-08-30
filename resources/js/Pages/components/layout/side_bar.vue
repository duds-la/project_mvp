<template>
  <!-- sidebar desktop -->
  <div v-if="menuAberto">
    <side_bar_open @toggleMenu="toggleMenu" />
  </div>
  <div v-else>
    <side_bar_close @toggleMenu="toggleMenu" />
  </div>
</template>

<script setup>
import { ref, defineEmits } from 'vue';
import side_bar_open from '../sideBar/side_bar_open.vue';
import side_bar_close from '../sideBar/side_bar_close.vue';

// Define the emit function
const emit = defineEmits(['menu-fechado', 'menu-aberto']);

const menuAberto = ref(true);

const toggleMenu = () => {
  menuAberto.value = !menuAberto.value;
  console.log('Menu toggled, menuAberto:', menuAberto.value);
  if (!menuAberto.value) {
    emit('menu-fechado');
  } else {
    emit('menu-aberto');
  }
};
</script>
