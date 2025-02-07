<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class motorista extends Model
{
    use HasFactory;
    protected $fillable = [
        "curso 1",
        "curso 2",
        "comprovante residencia",
        "antecedente estadual",
        "antecedente federal",
        "cpf",
        "nome",
        "apelido",
        ""
    ];


}
