<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PJuridica extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'cnpj',
        'dataFundacao',
        'pessoa_id'
    ];

    // Relação 1 para 1 com cliente
    public function cliente() {
        return $this->hasOne(Cliente::class, 'pj_id');
    }

    // Relação (1 para 1)
    public function pessoa() {
        return $this->belongsTo(Pessoa::class, 'pessoa_id', 'id');
    }
}
