<?php

namespace App\Http\Services\TipoProduto;

use App\Enum\CodigoErroTipoProduto;
use App\Models\TipoProduto;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException as ValidationValidationException;

class TipoProdutoService
{
    public function store($post)
    {
        DB::beginTransaction();

        try {
            $novo_tipo_produto = new TipoProduto();

            $novo_tipo_produto->codigo = $post['codigo'];
            $novo_tipo_produto->classificacao = $post['classificacao'];
            $novo_tipo_produto->descricao = $post['descricao'];
            $novo_tipo_produto->situacao = $post['situacao'];
            
            $novo_tipo_produto->save();

            DB::commit();

            return true;

        } catch (\Exception $e) {
            DB::rollback();

            //Implementar erro de salvar
        }
    
    }

    public function show($id)
    {
        
        try {

            $tipo_servico = TipoProduto::find($id);
            return $tipo_servico;

        } catch (\Exception $e) {
            DB::rollback();

           //Implementar erro de salvar
        }
    
    }
    
    public function update($post, $id)
    {
        DB::beginTransaction();

        try {

            $tipo_servico = TipoProduto::find($id);

            $tipo_servico->codigo = $post['codigo'];
            $tipo_servico->descricao = $post['descricao'];
            $tipo_servico->classificacao = $post['classificacao'];
            $tipo_servico->situacao = $post['situacao'];

            $tipo_servico->update();

            DB::commit();

            return true;

        } catch (\Exception $e) {
            DB::rollback();

            // implemntar metodo
        }
    
    }

    public function destroy($id)
    {
        DB::beginTransaction();

        try {

            $tipo_servico = TipoProduto::find($id);
            $tipo_servico = $tipo_servico->delete();

            DB::commit();

            return true;

        } catch (\Exception $e) {
            DB::rollback();

            // implementar metodo
        }
    
    }

}