<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteStoreRequest;
use App\Http\Services\Cliente\ClienteService;
use App\Models\Cliente;
use Exception;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ClienteController extends Controller
{
    protected $clienteService;

    public function __construct(ClienteService $clienteService)
    {
        $this->clienteService = $clienteService;
    }

    public function index()
    {

        $clientes = Cliente::paginate(10);
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
    }

    public function create()
    {
        return Inertia::render('layout/cliente/cliente_cadastro');
    }

    public function store(ClienteStoreRequest $request)
    {
        $post = $request->input();
        $novo_cliente = $this->clienteService->store($post);

        return Inertia::render('layout/cliente/cliente_cadastro');
    }

    public function show(string $id)
    {
        $exibe_cliente = $this->clienteService->show($id);

        return Inertia::render('layout/cliente/cliente_edicao', [
            'cliente' => $exibe_cliente,
            'errors' => null,
        ]);
    }

    public function update(Request $request, string $id)
    {

        $post = $request->input();
        $cliente = $this->clienteService->update($post, $id);

        return Inertia::render('layout/cliente/cliente_cadastro');
    }

    public function destroy($id)
    {
        $deleta_cliente = $this->clienteService->destroy($id);

        return Inertia::render('layout/cliente/cliente_cadastro');
    }
}
