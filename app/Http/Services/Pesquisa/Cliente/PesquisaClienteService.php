<?php

namespace App\Http\Services\Pesquisa\Cliente;

use Illuminate\Support\Facades\DB;

class PesquisaClienteService
{
    public function pesquisaMultiplosCampos($parametro)
    {
        $cliente = DB::table('clientes')
        ->select('*')
        ->where('nome', 'like', '%'.$parametro.'%')
        ->orWhere('sobrenome', 'like', '%'.$parametro.'%')
        ->orWhere('documento', 'like', '%'.$parametro.'%')
        ->orWhere('numero', 'like', '%'.$parametro.'%')
        ->orWhere('email', 'like', '%'.$parametro.'%')
        ->paginate(10);

        return $cliente;

    }
}