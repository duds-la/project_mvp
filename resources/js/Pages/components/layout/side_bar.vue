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
import { ref } from 'vue';
import side_bar_open from '../sideBar/side_bar_open.vue';
import side_bar_close from '../sideBar/side_bar_close.vue';

const menuAberto = ref(true);

const toggleMenu = () => {
  menuAberto.value = !menuAberto.value;
};
</script>