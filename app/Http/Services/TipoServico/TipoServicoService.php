<?php

namespace App\Http\Services\TipoServico;

use App\Enum\CodigoErroTipoServico;
use App\Models\Cliente;
use App\Models\TipoServico;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException as ValidationValidationException;

class TipoServicoService
{
    public function store($post)
    {
        DB::beginTransaction();

        try {
            $novo_tipo_servico = new TipoServico();

            $novo_tipo_servico->codigo = $post['codigo'];
            $novo_tipo_servico->classificacao = $post['classificacao'];
            $novo_tipo_servico->descricao = $post['descricao'];
            $novo_tipo_servico->situacao = $post['situacao'];
            
            $novo_tipo_servico->save();

            DB::commit();

            return true;

        } catch (\Exception $e) {
            DB::rollback();

            $codigoErro = CodigoErroTipoServico::ERRO_SALVAR_TIPO_SERVICO->value;
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

            $tipo_servico = TipoServico::find($id);
            return $tipo_servico;

        } catch (\Exception $e) {
            DB::rollback();

            $codigoErro = CodigoErroTipoServico::ERRO_EXIBIR_TIPO_SERVICO->value;
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

            $tipo_servico = TipoServico::find($id);

            $tipo_servico->codigo = $post['codigo'];
            $tipo_servico->descricao = $post['descricao'];
            $tipo_servico->classificacao = $post['classificacao'];
            $tipo_servico->situacao = $post['situacao'];

            $tipo_servico->update();

            DB::commit();

            return true;

        } catch (\Exception $e) {
            DB::rollback();

            $codigoErro = CodigoErroTipoServico::ERRO_ATUALIZAR_TIPO_SERVICO->value;
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

            $tipo_servico = TipoServico::find($id);
            $tipo_servico = $tipo_servico->delete();

            DB::commit();

            return true;

        } catch (\Exception $e) {
            DB::rollback();

            $codigoErro = CodigoErroTipoServico::ERRO_DELETAR_TIPO_SERVICO->value;
            throw ValidationValidationException::withMessages(
                [
                    'erro' => "Ocorreu um erro ao deletar, contate o suporte!",
                    'codigoErro' => $codigoErro
                ]
            );
        }
    
    }

}