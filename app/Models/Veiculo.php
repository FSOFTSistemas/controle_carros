<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    use HasFactory;
    protected $fillable = [
        'placa',
        'modelo',
        'ano',
        'cor',
        'crlv',
        'foto1',
        'foto2',
        'foto3',
        'foto4',
        'foto5',
        'foto6',
        'tacografo',
        'vistoria',
        'autorizacao_te',
        'certificado_te', //te = transporte escolar
    ];
}
