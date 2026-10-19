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

    public function estoques() {
        return $this->hasMany(Estoque::class, "alimento_id");
    }
}