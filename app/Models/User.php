<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'telefone1',
        'telefone2',
        'cpf',
        'dataNascimento',
        'sexo',
        'image',
        'password',
        'status',
        'perfilAdministrador',
        'ultimoAcesso',
        'email',
        'dataAdmissao',
        'dataDemissao',
        'municipio_id',
        'gerente_id',
        'cargo_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relação 1 para muitos com grupos de clientes.
    public function grupocliente()
    {
        return $this->hasMany(GrupoCliente::class, 'user_id');
    }

    //Relação 1 gerente para muitos usuários (auto-relacionamento)
    public function gerente()
    {
        return $this->hasMany(User::class, 'gerente_id');
    }

    // Relação (MUITOS para 1) VERIFICAR(?)
    public function user()
    {
        return $this->belongsTo(User::class, 'gerente_id', 'id');
    }

    // Relação (MUITOS para 1)
    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'cargo_id', 'id');
    }

    // Relação (MUITOS para 1)
    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'municipio_id', 'id');
    }
}
