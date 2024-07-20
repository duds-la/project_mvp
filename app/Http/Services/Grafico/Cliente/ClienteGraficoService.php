<?php

namespace App\Http\Services\Grafico\Cliente;

use App\Models\Cliente;

class ClienteGraficoService
{
    public function graficosCadastro()
    {
        $clientes = Cliente::count();

        $grafico['dados'] = 
        [
            'Clientes Cadastrados' => $clientes,
            'Clientes Ativos' => $clientes,
            'Clientes Inativos' => $clientes
        ];

        return $grafico;

    }
}