<template>
    <layoutBase>
        <div>
            <!-- GRÁFICOS -->
            <div class="flex flex-row w-full justify-between items-center px-">
                
                <div class="bg-gray-200 w-full"><graficos_cliente /></div>

            </div>

            <!-- BOTÕES DE AÇÕES -->
            <div class="flex flex-row w-full justify-between items-center space-x-4 mt-2">
                <div class="p-10"><botao_cadastrar :rota="rotaCadastroCliente.rota"/></div>
                <div class="flex-grow"><botao_pesquisar :rota="rotaPesquisaCliente.rota"/></div>
            </div>

            <!-- PAGINACAO -->
            <div class="">
                <paginacao_componente :paginacao="paginacao"/>
            </div>

            <!-- TABELA -->
            <div>
                <tabela_index_cliente :clientes="clientes"/>
            </div>

            

            

        </div>
    </layoutBase>

</template>
<script setup>
import { router } from '@inertiajs/vue3';

import layoutBase from '../../components/layout/layout_base.vue';
import paginacao_componente from '../../components/paginacao/paginacao_componente.vue';
import graficos_cliente from './components/graficos_cliente.vue';
import tabela_index_cliente from './components/tabela_index_cliente.vue';
import botao_cadastrar from '../../components/buttons/botao_cadastrar.vue';
import botao_pesquisar from '../../components/buttons/botao_pesquisar.vue';
import { rotaPesquisaCliente } from '../../../constants/links/index_rotas_pesquisa.js';
import { rotaCadastroCliente } from '../../../constants/links/index_rotas_cadastro.js';

const { clientes, paginacao } = defineProps(['clientes', 'paginacao']);

function changePage(url) {
    if (url) {
    router.get(`/admin/clientes/${url}/edit`);
    }
}
</script>