<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monitor extends Model
{
    use HasFactory;
    protected $fillable = [
        "cpf",
        "nome",
        "apelido",
        "telefone",
    ];

    public function endereco()
    {
        return $this->hasOne(Endereco::class)->withDefault();
    }
}
