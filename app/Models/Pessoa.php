<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cpf',
        'cnpj',
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'sexo',
        'telefone1',
        'telefone2',
        'email1',
        'email2',
        'dataNascFund',
        'cliente',
        'funcionario',
        'funcao',
        'observacao',
        'municipio_id'
    ];

    // Relação (1 para MUITOS)
    public function inscricaoEstadual()
    {
        return $this->hasMany(InscricaoEstadual::class, 'cliente_id');
    }

    // Relação (1 para MUITOS)
    public function grupoCliente()
    {
        return $this->hasMany(GrupoCliente::class, 'funcionario_id');
    }

    // Relação 1 para 1 com cliente
    public function equipeColaborador()
    {
        return $this->hasOne(Equipe::class, 'colaborador_id');
    }

    // Relação 1 para muitos com equipe
    public function equipeSuperior()
    {
        return $this->hasMany(Equipe::class, 'superior_id');
    }

    // Relação 1 para 1 com Usuario
    public function usuario()
    {
        return $this->hasOne(Usuario::class, 'pessoa_id');
    }

    // Relação (MUITOS para 1)
    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'id');
    }
}
