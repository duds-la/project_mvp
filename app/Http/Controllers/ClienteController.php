<?php

namespace App\Http\Controllers;

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
        try{

            $clientes = Cliente::paginate(15);
            $cliente = $clientes->items();
            
            $totalPaginas = $clientes->lastPage();

            return Inertia::render('layout/cliente/cliente_index', [
                'clientes' => $cliente,
                'totalPaginas' => $totalPaginas
            ]);


        }catch(Exception $e){
            return 123;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
