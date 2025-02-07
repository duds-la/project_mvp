<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoServico extends Model
{
    use HasFactory;

    protected $table = 'tipos_servicos';

    protected $fillable = [
        'codigo',
        'descricao',
        'classificacao',
        'situacao',
    ];
}
