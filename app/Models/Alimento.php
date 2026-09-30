<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alimento extends Model
{
    protected $table = 'alimento';
    
    protected $fillable = [
        'nome',
        'unidade_medida',
        'descricao'
    ];
}
