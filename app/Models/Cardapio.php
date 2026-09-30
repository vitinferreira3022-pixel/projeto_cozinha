<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cardapio extends Model
{
    protected $table = 'cardapio';
    
    protected $fillable = [
        'cafe_manha',
        'almoco',
        'cafe_tarde',
        'data',
        'funcionario_id'
    ];
}
