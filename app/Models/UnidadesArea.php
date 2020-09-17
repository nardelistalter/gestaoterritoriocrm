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
}
