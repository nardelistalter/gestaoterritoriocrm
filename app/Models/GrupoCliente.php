<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoCliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'descricao',
        'user_id'
    ];

    // Relação 1 para muitos com meta
    public function meta() {
        return $this->hasMany(Meta::class, 'grupoCliente_id');
    }

    // Relação 1 para muitos com Inscrição Estadual
    public function inscricaoestadual() {
        return $this->hasMany(InscricaoEstadual::class, 'grupoCliente_id');
    }

    // Relação 1 para muitos com áreas por grupos de cliente
    public function areagrupocliente() {
        return $this->hasMany(AreaGrupoCliente::class, 'grupoCliente_id');
    }

    // Relação (MUITOS para 1)
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
