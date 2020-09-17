<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'sigla'
    ];

    // Relação 1 para muitos com microrregiões
    public function microrregiao() {
        return $this->hasMany(Microrregiao::class, 'estado_id');
    }
}
