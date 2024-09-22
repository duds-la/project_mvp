<?php

namespace App\Enum;

enum CodigoErroTipoServico: string
{
    case ERRO_EXIBIR_TIPO_SERVICO = "sts100"; 
    case ERRO_SALVAR_TIPO_SERVICO = "sts110"; 
    case ERRO_DELETAR_TIPO_SERVICO = 'sts120'; 
    case ERRO_ATUALIZAR_TIPO_SERVICO = 'sts130'; 
}
