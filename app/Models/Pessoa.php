<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
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
        'municipio_id'
    ];

    // Relação 1 para 1 com emails
    public function email() {
        return $this->hasMany(Email::class, 'pessoa_id');
    }

     // Relação 1 para muitos com pessoas fisicas
     public function pFisica() {
        return $this->hasOne(PFisica::class, 'pessoa_id');
    }

    // Relação 1 para 1 com pessoas juridicas
    public function pJuridica() {
        return $this->hasOne(PJuridica::class, 'pessoa_id');
    }

    // Relação (MUITOS para 1)
    public function municipio() {
        return $this->belongsTo(Municipio::class, 'id');
    }
}
