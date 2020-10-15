<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'observacao',
        'visaoPolitica_id',
        'pf_id',
        'pj_id'
    ];

    // Relação (1 para MUITOS)
    public function inscricaoestadual() {
        return $this->hasMany(InscricaoEstadual::class, 'cliente_id');
    }

    // Relação (MUITOS para 1)
    public function visapolitica() {
        return $this->belongsTo(VisaoPolitica::class, 'visaoPolitica_id', 'id');
    }

    // Relação (1 para 1)
    public function pfisica() {
        return $this->belongsTo(PFisica::class, 'pf_id', 'id');
    }

    // Relação (1 para 1)
    public function pjuridica() {
        return $this->belongsTo(PJuridica::class, 'pj_id', 'id');
    }
}
