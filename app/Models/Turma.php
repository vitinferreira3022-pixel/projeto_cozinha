<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Aluno;

class Turma extends Model
{
    protected $table = 'turma';
    
    protected $fillable = [
        'serie'
    ];

    public function alunos() {
        return $this->hasMany(Aluno::class, "turma_id");
    }
}