<?php

namespace App\Http\Controllers;

use App\Http\Services\Pesquisa\TipoServico\PesquisaTipoServicoService;
use App\Models\Cliente;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class PesquisaTipoServicoController extends Controller
{
    protected $pesquisaTipoServicoService;

    public function __construct(PesquisaTipoServicoService $pesquisaTipoServicoService)
    {
        $this->pesquisaTipoServicoService = $pesquisaTipoServicoService;
    }
    
    public function pesquisaTipoServicoMultiplosCampos(Request $request)
    {
    
        try {

            $post = $request->input('parametro');

            $tipos_servicos = $this->pesquisaTipoServicoService->pesquisaMultiplosCampos($post);

            $paginacao = [];
            $paginacao = [
                'totalPaginas' => $tipos_servicos->lastPage(),
                'currentPage' => $tipos_servicos->currentPage(),
                'nextPageUrl' => $tipos_servicos->nextPageUrl(),
                'prevPageUrl' => $tipos_servicos->previousPageUrl()
            ];
    
            return Inertia::render('layout/tipoServico/tipo_servico_index', [
                'tiposServicos' => $tipos_servicos->items(),
                'paginacao' => $paginacao
            ]);
    
        } catch (Exception $e) {
            return 123;
        }

    }

}
