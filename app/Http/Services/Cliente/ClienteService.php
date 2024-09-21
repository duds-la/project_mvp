<?php

namespace App\Http\Services\Cliente;

use App\Enum\CodigoErroCliente;
use App\Http\Services\TipoPessoa\TipoPessoaService;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException as ValidationValidationException;

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
            // $novo_cliente->tipo_id = $tipo_pessoa;
            $novo_cliente->numero = $post['numero'];
            $novo_cliente->data_nascimento = $post['data_nascimento'];
            $novo_cliente->email = $post['email'];

            $novo_cliente->save();

            DB::commit();

            return true;

        } catch (\Exception $e) {
            DB::rollback();

            $codigoErro = CodigoErroCliente::ERRO_SALVAR_CLIENTE->value;
            throw ValidationValidationException::withMessages(
                [
                    'erro' => "Ocorreu um erro ao salvar, contate o suporte!",
                    'codigoErro' => $codigoErro
                ]
            );
        }
    
    }

    public function show($id)
    {
        
        try {

            $cliente = Cliente::find($id);
            return $cliente;

        } catch (\Exception $e) {
            DB::rollback();

            $codigoErro = CodigoErroCliente::ERRO_EXIBIR_CLIENTE->value;
            throw ValidationValidationException::withMessages(
                [
                    'erro' => "Ocorreu um erro ao exibir o registro, contate o suporte!",
                    'codigoErro' => $codigoErro
                ]
            );
        }
    
    }
    
    public function update($post, $id)
    {
        DB::beginTransaction();

        try {

            $cliente = Cliente::find($id);

            $cliente->nome = $post['nome'];
            $cliente->sobrenome = $post['sobrenome'];
            $cliente->documento = $post['documento'];
            $cliente->numero = $post['numero'];
            $cliente->data_nascimento = $post['data_nascimento'];
            $cliente->email = $post['email'];

            $cliente->update();

            DB::commit();

            return true;

        } catch (\Exception $e) {
            DB::rollback();

            $codigoErro = CodigoErroCliente::ERRO_ATUALIZAR_CLIENTE->value;
            throw ValidationValidationException::withMessages(
                [
                    'erro' => "Ocorreu um erro ao atualizar, contate o suporte!",
                    'codigoErro' => $codigoErro
                ]
            );
        }
    
    }

    public function destroy($id)
    {
        DB::beginTransaction();

        try {

            $cliente = Cliente::find($id);
            $cliente = $cliente->delete();

            DB::commit();

            return true;

        } catch (\Exception $e) {
            DB::rollback();

            $codigoErro = CodigoErroCliente::ERRO_DELETAR_CLIENTE->value;
            throw ValidationValidationException::withMessages(
                [
                    'erro' => "Ocorreu um erro ao deletar, contate o suporte!",
                    'codigoErro' => $codigoErro
                ]
            );
        }
    
    }

}