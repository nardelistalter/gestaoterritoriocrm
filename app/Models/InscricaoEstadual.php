<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InscricaoEstadual extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero',
        'localidade',
        'grupoCliente_id',
        'cliente_id',
        'municipio_id'
    ];

    // Relação 1 para muitos com operações
    public function operacao() {
        return $this->hasMany(Operacao::class, 'inscricaoEstadual_id');
    }

    // Relação (MUITOS para 1)
    public function municipio() {
        return $this->belongsTo(Municipio::class, 'id');
    }

    // Relação (MUITOS para 1)
    public function grupoCliente() {
        return $this->belongsTo(GrupoCliente::class, 'id');
    }

    // Relação (MUITOS para 1)
    public function cliente() {
        return $this->belongsTo(Pessoa::class, 'id');
    }

}
