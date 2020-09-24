<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'microrregiao_id'
    ];

    // Relação 1 para muitos com pessoas
    public function pessoa() {
        return $this->hasMany(Pessoa::class, 'municipio_id');
    }

    // Relação 1 para muitos com unidades de area
    public function unidadesArea() {
        return $this->hasMany(UnidadesArea::class, 'municipio_id');
    }

    // Relação 1 para muitos com inscrições estaduais
    public function inscricaoEstadual() {
        return $this->hasMany(InscricaoEstadual::class, 'municipio_id');
    }

    // Relação 1 para muitos com áreas por grupos de cliente
    public function areaGrupoCliente() {
        return $this->hasMany(AreaGrupoCliente::class, 'municipio_id');
    }

    // Relação (MUITOS para 1)
    public function microrregiao() {
        return $this->belongsTo(Microrregiao::class, 'microrregiao_id', 'id');
    }
}
