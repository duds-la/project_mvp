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
                v-for="(cliente, index) in dadosClientes"
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
                  <i class="ri-settings-3-line text-lg"></i>
                  </a>
                  <div
                    v-if="exibeOpcoesCliente === index"
                    id="opcoes_cliente"
                    class="absolute top-0 right-0 z-10 w-44 bg-gray-100 rounded divide-y divide-gray-500 shadow"
                  >
                    <ul class="py-1 text-sm text-gray-700 " aria-labelledby="actionsDropdownButton">
                      <li>
                        <a
                        @click="edit1(cliente.id)"
                          href="#"
                          class="block py-2 px-4 hover:bg-gray-200 text-cyan-500"
                          >Editar <i class="ri-edit-line"></i></a
                        > 
                      </li>
                    </ul>
                    <div class="py-1">
                      <a
                        @click="delete1(cliente.id)"
                        href="#"
                        class="block py-2 px-4 text-sm text-red-500 hover:bg-gray-200 "
                        >Excluir <i class="ri-delete-bin-line"></i> </a
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
  import { router, usePage } from '@inertiajs/vue3';
  import { computed } from 'vue';

  const page = usePage();

  const dadosClientes = computed(() => page.props.clientes)
  
  const exibeOpcoesCliente = ref(null);
  
  const toggleActions = (index) => {
    exibeOpcoesCliente.value = exibeOpcoesCliente.value === index ? null : index;
  };

  const delete1 = (id) => {
  // Converte o id para um número inteiro
  const clienteId = Number(id);
  router.delete(`/cliente/${clienteId}`);
};

const edit1 = (id) => {
  // Converte o id para um número inteiro
  const clienteId = Number(id);
  router.get(`/cliente/${clienteId}`);
};
  </script>
  