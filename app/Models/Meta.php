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
        'metaDesejada',
        'programaDeNegocio_id',
        'grupoCliente_id'
    ];

    // Relação (MUITOS para 1)
    public function grupoCliente() {
        return $this->belongsTo(GrupoCliente::class, 'grupoCliente_id', 'id');
    }

    // Relação 1 para muitos com metas
    public function programadenegocio() {
        return $this->belongsTo(programaDeNegocio::class, 'programaDeNegocio_id', 'id');
    }
}
