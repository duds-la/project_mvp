<template>
    <div>
      <div class="bg-gray-300 mr-10 p-4 rounded-b-lg cursor-pointer mb-2" @click="opcoesUsuario">
        <div class="w-ful text-center"><span>UFG | ADMIN</span></div>
        
        <div v-if="opcoesAbertas" class="mt-4">
          <!-- Conteúdo adicional para a opção "editor" -->
          <p>Conta</p>
          <p>Sair</p>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  
  const opcoesAbertas = ref(false);
  
  // Função para alternar o estado de abertura e fechamento
  const opcoesUsuario = () => {
    opcoesAbertas.value = !opcoesAbertas.value;
  };
  </script>
  
  