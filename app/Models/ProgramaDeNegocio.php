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

    // Relação (MUITOS para 1)
    public function segmentoCultura() {
        return $this->belongsTo(SegmentoCultura::class, 'id');
    }

    // Relação (MUITOS para 1)
    public function safra() {
        return $this->belongsTo(Safra::class, 'id');
    }

    // Relação (MUITOS para 1)
    public function grupoProduto() {
        return $this->belongsTo(GrupoProduto::class, 'segmentoCultura_id', 'id');
    }
}
