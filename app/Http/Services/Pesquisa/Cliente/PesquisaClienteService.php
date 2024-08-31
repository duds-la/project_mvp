<?php

namespace App\Http\Services\Pesquisa\Cliente;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class PesquisaClienteService
{
    public function pesquisaMultiplosCampos($parametro)
    {
        $cliente = DB::table('clientes')
            ->select('*')
            ->where('nome', 'like', '%' . $parametro . '%')
            ->orWhere('sobrenome', 'like', '%' . $parametro . '%')
            ->orWhere('documento', 'like', '%' . $parametro . '%')
            ->orWhere('numero', 'like', '%' . $parametro . '%')
            ->orWhere('email', 'like', '%' . $parametro . '%')
            ->paginate(10);

        return $cliente;
    }

    public function pesquisaCnpj($cnpj)
    {
        $cnpjLimpo = preg_replace('/\D/', '', $cnpj);

        $response = Http::get("https://api.cnpjs.dev/v1/$cnpjLimpo");

        if ($response->successful()) {
            return $response->json(); // Retorna os dados da empresa em formato JSON
        } else {
            return false;
        }
    }
}
