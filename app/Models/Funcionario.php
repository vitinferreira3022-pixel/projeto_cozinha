<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = 'funcionario';
    
    protected $fillable = [
        'nome',
        'email',
        'senha',
        'cpf',
        'data_nascimento'
    ];

}
