<?php

namespace App\Http\Services\Cliente;

use App\Http\Services\TipoPessoa\TipoPessoaService;
use App\Models\Cliente;
use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClienteService
{
    public function store($post)
    {
        DB::beginTransaction();

        try {

            $tipo_pessoa = TipoPessoaService::verificaTipoPessoa($post['tipo']);

            $novo_cliente = new Cliente();

            $novo_cliente->nome = $post['nome'];
            $novo_cliente->sobrenome = $post['sobrenome'];
            $novo_cliente->documento = $post['documento'];
            $novo_cliente->tipo_id = $tipo_pessoa;
            $novo_cliente->numero = $post['numero'];
            $novo_cliente->data_nascimento = $post['data_nascimento'];
            $novo_cliente->email = $post['email'];

            $novo_cliente->save();

            DB::commit();

            return true;

        } catch (\Exception $e) {
            DB::rollback();
        }
    
    }
    
    public function destroy($id)
    {
        DB::beginTransaction();

        try {

            $cliente = Cliente::find($id);
            $cliente->delete();

            DB::commit();

            return true;

        } catch (\Exception $e) {
            DB::rollback();
        }
    
    }
}