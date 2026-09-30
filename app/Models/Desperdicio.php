<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Desperdicio extends Model
{
    protected $table = 'desperdicio';
    
    protected $fillable = [
        'cardapio_id',
        'desperdicio_manha',
        'desperdicio_almoco',
        'desperdicio_tarde',
        'motivo'
    ];
}
