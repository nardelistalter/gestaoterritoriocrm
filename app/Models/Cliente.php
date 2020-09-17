<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'pessoa_id',
        'observacao',
        'visaoPolitica_id'
    ];

    // Relação (1 para MUITOS)
    public function inscricaoEstadual() {
        return $this->hasMany(InscricaoEstadual::class, 'clientePessoa_id');
    }

    // Relação (MUITOS para 1)
    public function visaPolitica() {
        return $this->belongsTo(VisaoPolitica::class, 'id');
    }

    // Relação (1 para 1)
    public function pessoa() {
        return $this->belongsTo(Pessoa::class, 'id');
    }
}
