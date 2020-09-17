<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    use HasFactory;

    protected $fillable = [
        'ano',
        'mes',
        'participacaoDesejada',
        'grupoProduto_id',
        'safra_id',
        'grupoCliente_id'
    ];

    // Relação (MUITOS para 1)
    public function grupoCliente() {
        return $this->belongsTo(GrupoCliente::class, 'id');
    }

    // Relação (MUITOS para 1)
    public function safra() {
        return $this->belongsTo(Safra::class, 'id');
    }

    // Relação (MUITOS para 1)
    public function grupoProduto() {
        return $this->belongsTo(GrupoProduto::class, 'id');
    }
}
