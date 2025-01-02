<?php

namespace App\Http\Controllers;

use App\Http\Requests\TipoProdutoStoreRequest;
use App\Http\Services\TipoProduto\TipoProdutoService;
use App\Models\TipoProduto;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TipoProdutoController extends Controller
{
    protected $tipoProdutoService;

    public function __construct(TipoProdutoService $tipoProdutoService)
    {
        $this->tipoProdutoService = $tipoProdutoService;
    }

    public function index()
    {
        $tipos_produtos = TipoProduto::paginate(10);
        
        $paginacao = [];
        $paginacao = [
            'totalPaginas' => $tipos_produtos->lastPage(),
            'currentPage' => $tipos_produtos->currentPage(),
            'nextPageUrl' => $tipos_produtos->nextPageUrl(),
            'prevPageUrl' => $tipos_produtos->previousPageUrl()
        ];

        return Inertia::render('layout/tipoProduto/tipo_produto_index', [
            'tiposProdutos' => $tipos_produtos->items(),
            'paginacao' => $paginacao
        ]);
    }

    public function create()
    {
        return Inertia::render('layout/tipoProduto/tipo_produto_cadastro');
    }

    public function store(TipoProdutoStoreRequest $request)
    {
        $post = $request->input();
        $novo_tipo_produto = $this->tipoProdutoService->store($post);

        return self::index();
    }

    public function show(string $id)
    {
        $exibe_tipo_produto = $this->tipoProdutoService->show($id);

        return Inertia::render('layout/tipoProduto/tipo_produto_edicao', [
            'tipoProduto' => $exibe_tipo_produto,
            'errors' => null,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $post = $request->input();
        $tipo_produto = $this->tipoProdutoService->update($post, $id);

        return self::index();
    }

    public function destroy(string $id)
    {
        $deleta_tipo_produto = $this->tipoProdutoService->destroy($id);

        return self::index();
    }
}
