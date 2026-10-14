<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Estoque;

class Alimento extends Model
{
    protected $table = 'alimento';
    
    protected $fillable = [
        'nome',
        'unidade_medida',
        'descricao'
    ];

    public function alimento {
        return $this->hasMany(Alimento::class, "funcionario_id");
    }
}
