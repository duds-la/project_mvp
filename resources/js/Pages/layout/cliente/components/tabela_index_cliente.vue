<template>
    <div>
        <div class="w-full mt-2 ">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Cliente
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    CPF/CNPJ
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    NUMERO
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    EMAIL
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(cliente, index) in clientes" :key="index"
                                class="odd:bg-gray-50  even:bg-gray-300">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    {{ cliente.nome }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ cliente.documento }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ cliente.numero }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ cliente.email }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>

            </div>
    </div>
</template>
<script setup>
const { clientes } = defineProps(['clientes']);

</script>