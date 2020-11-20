<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramaDeNegocio extends Model
{
    use HasFactory;

    protected $fillable = [
        'valorUnitario',
        'mesLimite',
        'grupoProduto_id',
        'safra_id',
        'segmentoCultura_id'
    ];

    // Relação 1 para muitos com programas de negócio
    public function meta() {
        return $this->hasMany(Meta::class, 'programaDeNegocio_id');
    }

    // Relação (MUITOS para 1)
    public function segmentocultura() {
        return $this->belongsTo(SegmentoCultura::class, 'segmentoCultura_id', 'id');
    }

    // Relação (MUITOS para 1)
    public function safra() {
        return $this->belongsTo(Safra::class, 'safra_id', 'id');
    }

    // Relação (MUITOS para 1)
    public function grupoproduto() {
        return $this->belongsTo(GrupoProduto::class, 'grupoProduto_id', 'id');
    }
}
