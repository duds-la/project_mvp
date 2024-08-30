<template>
  <div>
    <nav class="flex" aria-label="Breadcrumb">
      <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
          <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 ">
            <i class="ri-home-fill mr-2"></i>
            Página Inicial
          </a>
        </li>

        <!-- Renderiza os itens do breadcrumb de forma recursiva -->
        <BreadcrumbItem v-for="(item, index) in items" :key="index" :item="item" />
      </ol>
    </nav>
  </div>
</template>

<script setup>
import BreadcrumbItem from './breadCrumbItem.vue'; // Importa o componente recursivo

const { items } = defineProps(['items']);
</script>
