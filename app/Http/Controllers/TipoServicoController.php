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
        $tipos_servicos = TipoServico::paginate(10);
        
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
    }

    public function create()
    {
        return Inertia::render('layout/tipoServico/tipo_servico_cadastro');
    }

    public function store(TipoServicoStoreRequest $request)
    {
        $post = $request->input();
        $novo_tipo_servico = $this->tipoServicoService->store($post);

        return Inertia::render('layout/tipoServico/tipo_servico_cadastro');
    }

    public function show(string $id)
    {
        $exibe_tipo_servico = $this->tipoServicoService->show($id);

        return Inertia::render('layout/tipoServico/tipo_servico_edicao', [
            'tiposServico' => $exibe_tipo_servico,
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

        return self::index();
    }
}
