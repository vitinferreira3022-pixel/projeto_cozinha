<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $table = 'aluno';
    
    protected $fillable = [
        'nome',
        'data_nascimento',
        'cpf',
        'turma_id'
    ];
}
