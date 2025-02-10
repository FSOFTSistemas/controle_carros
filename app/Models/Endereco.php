<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;
    protected $fillable =[
        "logradouro",
        "numero",
        "bairro",
        "cep",
        "uf",
        "monitor_id"
    ];

    public function monitor()
    {
        return $this->belongsTo(Monitor::class);
    }
}
