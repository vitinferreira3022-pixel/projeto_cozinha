<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Alimento;
use App\Models\Funcionario;

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

    public function alimento() {
        return $this->belongsToMany(Alimento::class, "alimento_id");
    }

    public function funcionario() {
        return $this->belongsToMany(Funcionario::class, "funcionario_id");
    }
}
