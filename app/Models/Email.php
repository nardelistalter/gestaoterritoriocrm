<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'pessoa_id'
    ];

    // Relação 1 para 1 com usuário
    public function usuario() {
        return $this->hasOne(Usuario::class, 'email_id');
    }

    // Relação (MUITOS para 1)
    public function pessoa() {
        return $this->belongsTo(Pessoa::class, 'pessoa_id', 'id');
    }
}
