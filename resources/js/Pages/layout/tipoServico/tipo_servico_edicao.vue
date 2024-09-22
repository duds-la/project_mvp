<template>
        <div class="flex justify-between">
            <div class="p-4 mb-4">
                <breadCrumb :items="breadCrumbClienteEdicao" />
            </div>
            <div class="p-4 mb-4">
                <botao_voltar :rota="rotaClienteIndex.rota"/>
            </div>
        </div>
        <div>
            <form_edicao :cliente="cliente"/>
        </div>

</template>
<script setup>
import { breadCrumbClienteEdicao } from '../../../constants/bread_crumps/clientes/index_bread_crump_cliente.js';
import breadCrumb from '../../components/bradCrumb/breadCrumb.vue';
import botao_voltar from '../../components/buttons/botao_voltar.vue';
import form_edicao from './components/form_edicao.vue';
import { rotaClienteIndex } from '../../../constants/rotas/cliente/index_rotas.js';

const { cliente } = defineProps(['cliente']);

</script>