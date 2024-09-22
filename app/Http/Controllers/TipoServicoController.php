<?php

namespace App\Http\Controllers;

use App\Http\Requests\TipoServicoStoreRequest;
use App\Http\Services\TipoServico\TipoServicoService;
use App\Models\TipoServico;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TipoServicoController extends Controller
{

    protected $tipoServicoService;

    public function __construct(TipoServicoService $tipoServicoService)
    {
        $this->tipoServicoService = $tipoServicoService;
    }
    
    public function index()
    {
        $tiposServicos = TipoServico::paginate(10);
        $paginacao = [];
        $paginacao = [
            'totalPaginas' => $tiposServicos->lastPage(),
            'currentPage' => $tiposServicos->currentPage(),
            'nextPageUrl' => $tiposServicos->nextPageUrl(),
            'prevPageUrl' => $tiposServicos->previousPageUrl()
        ];

        return Inertia::render('layout/cliente/cliente_index', [
            'tiposServicos' => $tiposServicos->items(),
            'paginacao' => $paginacao
        ]);
    }

    public function create()
    {
        return Inertia::render('layout/cliente/cliente_cadastro');
    }

    public function store(TipoServicoStoreRequest $request)
    {
        $post = $request->input();
        $novo_tipo_servico = $this->tipoServicoService->store($post);

        return Inertia::render('layout/cliente/cliente_cadastro');
    }

    public function show(string $id)
    {
        $exibe_tipos_servico = $this->tipoServicoService->show($id);

        return Inertia::render('layout/cliente/cliente_edicao', [
            'tipos_servico' => $exibe_tipos_servico,
            'errors' => null,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $post = $request->input();
        $tipo_servico = $this->tipoServicoService->update($post, $id);

        return Inertia::render('layout/cliente/cliente_cadastro');
    }

    public function destroy(string $id)
    {
        $deleta_tipo_servico = $this->tipoServicoService->destroy($id);

        return Inertia::render('layout/cliente/cliente_cadastro');
    }
}
