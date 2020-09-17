<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'pessoa_id',
        'email',
        'senha',
        'status',
        'perfilAdministrador',
        'ultimoAcesso',
        'hashRecovery'
    ];

    // Relação (1 para 1)
    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'id');
    }
}
