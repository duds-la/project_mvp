<template>
    <layoutBase>
        <div>
            <!-- GRÁFICOS -->
            <div class="flex flex-row w-full justify-between items-center px-14">
                <div class="bg-white p-20">Grafico 1</div>
                <div class="bg-white p-20">Grafico 2</div>
                <div class="bg-white p-20">Grafico 3</div>

            </div>

            <!-- BOTÕES DE AÇÕES -->
            <div class="flex flex-row w-full justify-between items-center space-x-4 mt-2">
                <div class="bg-green-400 p-10">Cadastrar cliente</div>
                <div class="bg-green-400 p-10 flex-grow">PESQUISA</div>
            </div>

            <!-- TABELA -->
            <div class="w-full mt-2">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                            <tr
                                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Eduardo A.
                                </th>
                                <td class="px-6 py-4">
                                    123.4567.89-10
                                </td>
                                <td class="px-6 py-4">
                                    +5551995437643
                                </td>
                                <td class="px-6 py-4">
                                    edu@email.com
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

            <div class="flex flex-row w-full justify-center items-center space-x-4 mt-2">
                <div class="bg-gray-500 p-4">Paginacao</div>
                
            </div>

        </div>
    </layoutBase>

</template>
<script setup>

import layoutBase from '../../components/layout/layout_base.vue';


</script>