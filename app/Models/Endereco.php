<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    // Definindo os campos que são permitidos para preenchimento em massa (mass-assignment)
    protected $fillable = [
        'logradouro',
        'numero',
        'bairro',
        'cep',
        'uf',
    ];
}
