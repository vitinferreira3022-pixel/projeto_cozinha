<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Turma;

class Aluno extends Model
{
    protected $table = 'aluno';
    
    protected $fillable = [
        'nome',
        'email',
        'RM',
        'data_nascimento',
        'cpf',
        'turma_id'
    ];

    public function turma() {
        return $this->belongsTo(Turma::class, "turma_id");
    }
}