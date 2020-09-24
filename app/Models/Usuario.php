<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'senha',
        'status',
        'perfilAdministrador',
        'ultimoAcesso',
        'hashRecovery',
        'funcionario_id',
        'email_id'
    ];

    // Relação (1 para 1)
    public function funcionario() {
        return $this->belongsTo(Funcionario::class, 'funcionario_id', 'id');
    }

    // Relação (1 para 1)
    public function email() {
        return $this->belongsTo(Email::class, 'email_id', 'id');
    }
}
