<?php

namespace App\Http\Controllers;

use App\Http\Services\Grafico\Cliente\ClienteGraficoService;
use Illuminate\Http\Request;

class ClienteGraficoController extends Controller
{
    protected $clienteGraficoService;

    public function __construct(ClienteGraficoService $clienteGraficoService)
    {
        $this->clienteGraficoService = $clienteGraficoService;
    }
}
