<?php

namespace App\Http\Services\TipoPessoa;

use App\Models\TipoPessoa;
use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TipoPessoaService
{
    public static function verificaTipoPessoa($tipo_pessoa)
    {
        
        if($tipo_pessoa){
            $tipo_pessoa = TipoPessoa::where('codigo','PF')->first();
            $tipo_pessoa = $tipo_pessoa->id;
        }else{
            $tipo_pessoa = TipoPessoa::where('codigo','PJ')->first();
            $tipo_pessoa = $tipo_pessoa->id;
        }

        return $tipo_pessoa;
    }
}