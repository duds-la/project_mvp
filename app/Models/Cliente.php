<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'sobrenome',
        'cpf',
        'cpnj',
        'tipo_id',
        'numero',
        'data_nascimento',
        'email',
    ];

    public function tipoPessoa() : BelongsTo
    {
        return $this->belongsTo(TipoPessoa::class, 'tipo_id', 'id');
    }
}
