<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'data',
        'numeroDocumento',
        'qtdUnidadesProduto',
        'valorUnitario',
        'produto_id',
        'inscricaoEstadual_id'
    ];

    // Relação (MUITOS para 1)
    public function inscricaoEstadual() {
        return $this->belongsTo(InscricaoEstadual::class, 'id');
    }

    // Relação (MUITOS para 1)
    public function produto() {
        return $this->belongsTo(Produto::class, 'id');
    }
}
