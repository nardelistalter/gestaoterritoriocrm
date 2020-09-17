<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'colaborador_id',
        'superior_id'
    ];

    // Relação (1 para 1)
    public function pessoaColaborador()
    {
        return $this->belongsTo(Pessoa::class, 'id');
    }

    // Relação (Muitos para 1)
    public function pessoaSuperior()
    {
        return $this->belongsTo(Pessoa::class, 'id');
    }
}
