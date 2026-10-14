<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presenca extends Model
{
    protected $table = 'presenca';
    
    protected $fillable = [
        'aluno_id',
        'data',
        'funcionario_id'
    ];
}
