<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisaoPolitica extends Model
{
    protected $fillable = ['descricao'];

    // Relação 1 para muitos com clientes
    public function cliente() {
        return $this->hasMany(Address::class, 'visaoPolitica_id');
    }
}
