<?php

namespace App\Enum;

enum CodigoErroCliente: string
{
    case ERRO_EXIBIR_CLIENTE = "sc100"; // Código de erro relacionado ao salvar cliente
    case ERRO_SALVAR_CLIENTE = "sc110"; // Código de erro relacionado ao salvar cliente
    case ERRO_DELETAR_CLIENTE = 'sc120'; // Outro exemplo para deletar cliente
    case ERRO_ATUALIZAR_CLIENTE = 'sc130'; // Exemplo para atualizar cliente
}
