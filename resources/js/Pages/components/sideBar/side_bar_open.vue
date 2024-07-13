<template>
  <!-- sidebar desktop -->
  <div class="transition-all duration-300 transform w-[250px] fixed inset-y-0 start-0 bg-neutral-200 border-neutral-200">
    <div class="flex justify-between items-center px-8 pt-4">
      <img src="https://cdn-icons-png.flaticon.com/512/174/174854.png" width="10" height="5" class="mr-4 w-[15%]">
      <a class="w-full rounded-xl text-xl font-semibold focus:outline-none focus:opacity-80" href="#" aria-label="sua empresa">
        LAZZA - IT
      </a>
      <button @click="$emit('toggleMenu')" class="ml-4 text-neutral-700 dark:text-neutral-400 focus:outline-none">
        <i class="ri-arrow-left-double-fill"></i>
      </button>
    </div>

    <nav class="p-6 w-full flex flex-col flex-wrap">
      <ul class="space-y-1.5">
        <li v-for="(menuLink, index) in menuLinks" :key="index">
          <div>
            <a class="w-full text-center flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-neutral-700 rounded-lg hover:bg-gray-100 bg-neutral-300" @click="toggleSubMenu(index)">
              <span :class="menuLink.icone"></span>
              {{ menuLink.label }}
              <span v-if="menuLink.subMenu" class="ml-auto transition-transform ri-arrow-drop-down-line text-lg" :class="{ 'rotate-180': isSubMenuOpen(index) }"></span>
            </a>
            <!-- Submenu -->
            <div v-if="isSubMenuOpen(index)" class="pl-6 mt-1 space-y-1 bg-neutral-300 rounded-lg">
              <a v-for="(subItem, subIndex) in menuLink.subMenu" :key="subIndex" class="block py-1 px-2.5 text-sm text-neutral-700 rounded-lg hover:bg-gray-100" :href="subItem.href">
                {{ subItem.label }}
              </a>
            </div>
          </div>
        </li>
      </ul>
    </nav>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { menuLinks } from '../../../constants/links/index_menu.js';

const subMenuState = ref({});

const toggleSubMenu = (index) => {
  subMenuState.value[index] = !subMenuState.value[index];
};

const isSubMenuOpen = (index) => {
  return subMenuState.value[index];
};
</script>
