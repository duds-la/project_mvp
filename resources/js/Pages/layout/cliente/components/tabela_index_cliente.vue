<template>
    <div>
      <div class="w-full mt-2">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
          <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3">Cliente</th>
                <th scope="col" class="px-6 py-3">CPF/CNPJ</th>
                <th scope="col" class="px-6 py-3">NUMERO</th>
                <th scope="col" class="px-6 py-3">EMAIL</th>
                <th scope="col" class="px-6 py-3">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr
                v-for="(cliente, index) in clientes"
                :key="index"
                class="odd:bg-gray-50 even:bg-gray-300 relative"
              >
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                  {{ cliente.nome }}
                </th>
                <td class="px-6 py-4">{{ cliente.documento }}</td>
                <td class="px-6 py-4">{{ cliente.numero }}</td>
                <td class="px-6 py-4">{{ cliente.email }}</td>
                <td class="px-6 py-4 relative">
                  <a
                    @click.prevent="toggleActions(index)"
                    href="#"
                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                  >
                    Edit
                  </a>
                  <div
                    v-if="exibeOpcoesCliente === index"
                    id="opcoes_cliente"
                    class="absolute top-0 right-0 z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600"
                  >
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="actionsDropdownButton">
                      <li>
                        <a
                          href="#"
                          class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                          >Mass Edit</a
                        >
                      </li>
                    </ul>
                    <div class="py-1">
                      <a
                        href="#"
                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                        >Delete all</a
                      >
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  const { clientes } = defineProps(['clientes']);
  
  const exibeOpcoesCliente = ref(null);
  
  const toggleActions = (index) => {
    exibeOpcoesCliente.value = exibeOpcoesCliente.value === index ? null : index;
  };
  </script>
  