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
        "endereco_id"
    ];

    public function endereco()
    {
        return $this->belongsTo(Endereco::class);
    }
}
