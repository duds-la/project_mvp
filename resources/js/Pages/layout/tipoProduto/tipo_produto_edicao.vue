<template>
        <div class="flex justify-between">
            <div class="p-4 mb-4">
                <breadCrumb :items="breadCrumbTipoServicoEdicao" />
            </div>
            <div class="p-4 mb-4">
                <botao_voltar :rota="rotaTiposServicosIndex.rota"/>
            </div>
        </div>
        <div>
            <form_edicao :tiposServico="tiposServico"/>
        </div>

</template>
<script setup>
import { breadCrumbTipoServicoEdicao } from '../../../constants/bread_crumps/tiposServicos/index_bread_crump_tipos_servico.js';
import breadCrumb from '../../components/bradCrumb/breadCrumb.vue';
import botao_voltar from '../../components/buttons/botao_voltar.vue';
import form_edicao from './components/form_edicao.vue';
import { rotaTiposServicosIndex } from '../../../constants/rotas/tiposServicos/index_rotas.js';
import { computed } from 'vue';

const { tiposServico } = defineProps(['tiposServico']);

</script>