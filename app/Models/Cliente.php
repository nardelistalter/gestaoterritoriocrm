<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'telefone1',
        'telefone2',
        'municipio_id',
        'email',
        'cpf',
        'cnpj',
        'dataNascimento',
        'sexo',
        'observacao',
        'visaoPolitica_id'
    ];

    // Relação (1 para MUITOS)
    public function inscricaoestadual()
    {
        return $this->hasMany(InscricaoEstadual::class, 'cliente_id');
    }

    // Relação (MUITOS para 1)
    public function visaopolitica()
    {
        return $this->belongsTo(VisaoPolitica::class, 'visaoPolitica_id', 'id');
    }

    // Relação (MUITOS para 1)
    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'municipio_id', 'id');
    }
}
