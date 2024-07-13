<template>
  <!-- sidebar desktop -->
  <div class="transition-all duration-300 transform w-[80px] fixed inset-y-0 start-0 bg-neutral-200 border-neutral-200">
    <div class="items-center px-4 pt-6">
      <img src="https://cdn-icons-png.flaticon.com/512/174/174854.png" class="mr-4 w-full">
      <button @click="$emit('toggleMenu')" class="ml-4 text-neutral-700 dark:text-neutral-400 focus:outline-none">
      <i class="ri-arrow-right-double-fill"></i>
    </button>
    </div>
    

    <nav class="p-6 w-full flex flex-col flex-wrap">
      <ul class="space-y-1.5">
        <li v-for="(menuLink, index) in menuLinks" :key="index">
          <div>
            <a class="w-full text-center flex items-center py-2.5 px-2.5 text-md text-neutral-700 rounded-lg hover:bg-gray-100 bg-neutral-300" @click="toggleSubMenu(index)">
              <span :class="menuLink.icone"></span>
            </a>
          </div>
        </li>
      </ul>
    </nav>
    
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { menuLinks } from '../../../constants/links/index_menu.js';
</script>
