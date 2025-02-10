<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motorista extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'apelido',
        'cpf',
        'curso_1',
        'curso_2',
        'cnh',
        'data_vencimento_cnh',
        'comprovante_residencia',
        'antecedente_estadual',
        'antecedente_federal',
    ];
}
