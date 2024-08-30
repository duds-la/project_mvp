<template>
  <li class="flex items-center">
    <svg class="rtl:rotate-180 w-3 h-3 text-gray-700 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
      fill="none" viewBox="0 0 6 10">
      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="m1 9 4-4-4-4" />
    </svg>
    <a :href="item.href" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2">
      {{ item.label }}
    </a>

    <!-- Verifica se há submenus e chama o componente recursivo para renderizá-los -->
    <ol v-if="item.subMenu" class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
      <BreadcrumbItem v-for="(subItem, index) in item.subMenu" :key="index" :item="subItem" />
    </ol>
  </li>
</template>

<script setup>
import BreadcrumbItem from './breadCrumbItem.vue';
const { item } = defineProps(['item']);
</script>
