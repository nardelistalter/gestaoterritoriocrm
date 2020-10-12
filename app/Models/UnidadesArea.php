<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadesArea extends Model
{
    use HasFactory;

    protected $fillable = [
        'qtdArea',
        'unidadeMedida',
        'mktShareDesejado',
        'municipio_id',
        'segmentoCultura_id',
        'observacao'
    ];

    // Relação (MUITOS para 1)
    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'municipio_id', 'id');
    }

    // Relação (MUITOS para 1)
    public function segmentocultura()
    {
        return $this->belongsTo(SegmentoCultura::class, 'segmentoCultura_id', 'id');
    }
}
