<template>
    
        
        <div>
            <div class="p-4 mb-4">
                <breadCrumb :items="breadCrumbTipoServicoIndex" />
            </div>
            <!-- GRÁFICOS -->
            <div class="flex flex-row w-full justify-between items-center px-">
                
                <div class="bg-gray-200 w-full"><graficos_cliente /></div>

            </div>

            <!-- BOTÕES DE AÇÕES -->
            <div class="flex flex-row w-full justify-between items-center space-x-4 mt-2">
                <div class="p-10"><botao_cadastrar :rota="rotaCadastroTiposServicos.rota"/></div>
                <div class="flex-grow"><botao_pesquisar :rota="rotaPesquisaTipoServico.rota"/></div>
            </div>

            <!-- PAGINACAO -->
            <div class="">
                <paginacao_componente/>
            </div>

            <!-- TABELA -->
            <div>
                <tabela_index_tipo_servico/>
            </div>

        </div>

</template>
<script setup>
import { router, usePage } from '@inertiajs/vue3';
import paginacao_componente from '../../components/paginacao/paginacao_componente.vue';
import graficos_cliente from './components/graficos_cliente.vue';
import tabela_index_tipo_servico from './components/tabela_index_tipo_servico.vue';
import botao_cadastrar from '../../components/buttons/botao_cadastrar.vue';
import botao_pesquisar from '../../components/buttons/botao_pesquisar.vue';
import breadCrumb from '../../components/bradCrumb/breadCrumb.vue';
import { rotaPesquisaTipoServico } from '../../../constants/links/index_rotas_pesquisa.js';
import { rotaCadastroTiposServicos } from '../../../constants/links/index_rotas_cadastro.js';
import { breadCrumbTipoServicoIndex } from '../../../constants/bread_crumps/tiposServicos/index_bread_crump_tipos_servico.js';
import { computed } from 'vue';


const { clientes, paginacao } = defineProps(['clientes', 'paginacao']);

const page = usePage();

const dadosClientes = computed(() => page.props.clientes)
const dadosPaginacao = computed(() => page.props.paginacao)

function changePage(url) {
    if (url) {
    router.get(`/admin/clientes/${url}/edit`);
    }
}


</script>