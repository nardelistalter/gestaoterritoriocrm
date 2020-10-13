<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaGrupoCliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'qtdUnidadesArea',
        'grupoCliente_id',
        'segmentoCultura_id',
        'municipio_id'
    ];

    // Relação (MUITOS para 1)
    public function grupocliente() {
        return $this->belongsTo(GrupoCliente::class, 'grupoCliente_id', 'id');
    }

    // Relação (MUITOS para 1)
    public function segmentocultura() {
        return $this->belongsTo(SegmentoCultura::class, 'segmentoCultura_id', 'id');
    }

    // Relação (MUITOS para 1)
    public function municipio() {
        return $this->belongsTo(Municipio::class, 'municipio_id', 'id');
    }
}
