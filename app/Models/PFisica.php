<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PFisica extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'cpf',
        'dataNascimento',
        'sexo',
        'pessoa_id'
    ];

    // Relação 1 para 1 com funcionario
    public function funcionario() {
        return $this->hasOne(Funcionario::class, 'pf_id');
    }

    // Relação 1 para 1 com cliente
    public function cliente() {
        return $this->hasOne(Cliente::class, 'pf_id');
    }

    // Relação (1 para 1)
    public function pessoa() {
        return $this->belongsTo(Pessoa::class, 'pessoa_id', 'id');
    }
}
