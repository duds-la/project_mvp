<?php

namespace App\Http\Controllers;

use App\Http\Services\Pesquisa\Cliente\PesquisaClienteService;
use App\Models\Cliente;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class PesquisaClienteController extends Controller
{
    protected $pesquisaClienteService;

    public function __construct(PesquisaClienteService $pesquisaClienteService)
    {
        $this->pesquisaClienteService = $pesquisaClienteService;
    }
    
    public function pesquisaClienteMultiplosCampos(Request $request)
    {
    
        try {
            $post = $request->input('parametro');

            $clientes = $this->pesquisaClienteService->pesquisaMultiplosCampos($post);

            $paginacao = [];
            $paginacao = [
                'totalPaginas' => $clientes->lastPage(),
                'currentPage' => $clientes->currentPage(),
                'nextPageUrl' => $clientes->nextPageUrl(),
                'prevPageUrl' => $clientes->previousPageUrl()
            ];
    
            return Inertia::render('layout/cliente/cliente_index', [
                'clientes' => $clientes->items(),
                'paginacao' => $paginacao
            ]);
    
        } catch (Exception $e) {
            return 123;
        }

    }
    public function pesquisaClientePorCnpj(Request $request)
    {
    
        try {

            $post = $request->input('documento');

            $cliente = $this->pesquisaClienteService->pesquisaCnpj($post);

            return response()->json($cliente);

        } catch (Exception $e) {
            return 123;
        }

    }

}
