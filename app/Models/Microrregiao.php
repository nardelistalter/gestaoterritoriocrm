<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Microrregiao extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'estado_id'
    ];

    // Relação 1 para muitos com municípios
    public function municipio() {
        return $this->hasMany(Municipio::class, 'microrregiao_id');
    }

    // Relação (MUITOS para 1)
    public function estado(){
        return $this->belongsTo(Estado::class, 'estado_id', 'id');
    }
}
