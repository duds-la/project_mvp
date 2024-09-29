<?php

namespace App\Http\Services\Pesquisa\TipoServico;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class PesquisaTipoServicoService
{
    public function pesquisaMultiplosCampos($parametro)
    {
        $tipo_servico = DB::table('tipos_servicos')
            ->select('*')
            ->where('codigo', 'like', '%' . $parametro . '%')
            ->orWhere('descricao', 'like', '%' . $parametro . '%')
            ->orWhere('classificacao', 'like', '%' . $parametro . '%')
            ->orWhere('situacao', 'like', '%' . $parametro . '%')
            ->paginate(10);

        return $tipo_servico;
    }

}
