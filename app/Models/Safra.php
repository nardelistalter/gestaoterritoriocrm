<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Safra extends Model
{
    use HasFactory;

    protected $fillable = [
        'descricao',
        'dataInicio',
        'dataFim'
    ];

    // Relação 1 para muitos com programas de negócio
    public function programaDeNegocio() {
        return $this->hasMany(ProgramaDeNegocio::class, 'safra_id');
    }

}
