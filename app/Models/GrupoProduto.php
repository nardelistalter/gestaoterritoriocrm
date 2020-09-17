<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoProduto extends Model
{
    use HasFactory;

    protected $fillable = [
        'descricao',
        'unidadeMedida'
    ];

    // Relação 1 para muitos com produtos
    public function produto() {
        return $this->hasMany(Produto::class, 'grupoProduto_id');
    }

    // Relação 1 para muitos com programas de negócio
    public function programaDeNegocio() {
        return $this->hasMany(ProgramaDeNegocio::class, 'grupoProduto_id');
    }

    // Relação 1 para muitos com metas
    public function meta() {
        return $this->hasMany(Meta::class, 'grupoProduto_id');
    }
}
