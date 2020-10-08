<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'descricao',
        'grupoProduto_id'
    ];

     // Relação 1 para muitos com metas
     public function meta() {
        return $this->hasMany(Meta::class, 'produto_id');
    }

    // Relação 1 para muitos com operações
    public function operacao() {
        return $this->hasMany(Operacao::class, 'produto_id');
    }

    // Relação (1 para 1)
    public function grupoproduto() {
        return $this->belongsTo(GrupoProduto::class, 'grupoProduto_id', 'id');
    }
}
