<?php

namespace App\Http\Controllers;

use App\Http\Services\Grafico\Cliente\ClienteGraficoService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ClienteGraficoController extends Controller
{
    protected $clienteGraficoService;

    public function __construct(ClienteGraficoService $clienteGraficoService)
    {
        $this->clienteGraficoService = $clienteGraficoService;
    }

    public function graficosCadastro()
    {
        $graficos = $this->clienteGraficoService->graficosCadastro();
        
        return Inertia::render('layout/cliente/components/graficos_cliente', ['graficos' => $graficos]);
    }
}
