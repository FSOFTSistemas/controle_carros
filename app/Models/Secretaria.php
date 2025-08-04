<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secretaria extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome'
    ];

    public function veiculos()
    {
        return $this->hasMany(Veiculo::class);
    }

    public function motoristas()
    {
        return $this->hasMany(Motorista::class);
    }

    public function usuarios()
    {
        return $this->belongsToMany(User::class);
    }
}
