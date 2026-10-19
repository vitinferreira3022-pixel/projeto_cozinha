<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Estoque;

class Funcionario extends Model
{
    protected $table = 'funcionario';
    
    protected $fillable = [
        'nome',
        'email',
        'senha',
        'nif',
        'cpf',
        'data_nascimento'
    ];

    public function estoques() {
        return $this->hasMany(Estoque::class, "funcionario_id");
    }

}