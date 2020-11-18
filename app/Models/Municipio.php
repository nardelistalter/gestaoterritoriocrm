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

    // Relação 1 para muitos com clientes
    public function cliente() {
        return $this->hasMany(Cliente::class, 'municipio_id');
    }

    // Relação 1 para muitos com users
    public function user() {
        return $this->hasMany(User::class, 'municipio_id');
    }

    // Relação 1 para muitos com unidades de area
    public function unidadesarea() {
        return $this->hasMany(UnidadesArea::class, 'municipio_id');
    }

    // Relação 1 para muitos com inscrições estaduais
    public function inscricaoestadual() {
        return $this->hasMany(InscricaoEstadual::class, 'municipio_id');
    }

    // Relação 1 para muitos com áreas por grupos de cliente
    public function areagrupocliente() {
        return $this->hasMany(AreaGrupoCliente::class, 'municipio_id');
    }

    // Relação (MUITOS para 1)
    public function microrregiao() {
        return $this->belongsTo(Microrregiao::class, 'microrregiao_id', 'id');
    }
}
