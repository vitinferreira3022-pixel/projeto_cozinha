<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    protected $table = 'estoque';
    
    protected $fillable = [
        'alimento_id',
        'quantidade',
        'data_fabricacao',
        'data_validade',
        'funcionario_id'
    ];
}
