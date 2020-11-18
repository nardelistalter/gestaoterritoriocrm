<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;

    protected $fillable = [
        'descricao'
    ];

    // Relação (1 para MUITOS)
    public function user() {
        return $this->hasMany(User::class, 'cargo_id');
    }
}
