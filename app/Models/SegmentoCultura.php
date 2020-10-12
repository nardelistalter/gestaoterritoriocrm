<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SegmentoCultura extends Model
{
    use HasFactory;

    protected $fillable = [
        'descricao',
        'unidadeMedida'
    ];

    // Relação 1 para muitos com unidades de área
    public function unidadesarea() {
        return $this->hasMany(Address::class, 'segmentoCultura_id');
    }

    // Relação 1 para muitos com programas de negócio
    public function programadenegocio() {
        return $this->hasMany(Address::class, 'segmentoCultura_id');
    }

    // Relação 1 para muitos com áreas por grupos de cliente
    public function areagrupocliente() {
        return $this->hasMany(Address::class, 'segmentoCultura_id');
    }
}
