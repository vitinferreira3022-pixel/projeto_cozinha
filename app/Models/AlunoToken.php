<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlunoToken extends Model
{
    protected $table = 'aluno_token';
    protected $fillable = [
        'aluno_id',
        'token',
        'valido_ate',
    ];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class, 'aluno_id');
    }
}