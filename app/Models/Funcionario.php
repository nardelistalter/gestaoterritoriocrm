<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'dataAdmissao',
        'dataDemissao',
        'gerente_id',
        'pf_id',
        'cargo_id'
    ];

    // Relação 1 para muitos com grupos de clientes
    public function grupoCliente()
    {
        return $this->hasMany(GrupoCliente::class, 'funcionario_id');
    }

    // Relação 1 para 1 com usuario (Usuário com acesso ao sistema)
    public function usuario()
    {
        return $this->hasOne(Usuario::class, 'funcionario_id');
    }

    //Relação 1 gerente para muitos funcionários (auto-relacionamento)
    public function gerente()
    {
        return $this->hasMany(Funcionario::class, 'gerente_id', 'id');
    }

    // Relação (MUITOS para 1)
    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'id');
    }

    // Relação (MUITOS para 1) VERIFICAR(?)
    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'id');
    }

    // Relação (1 para 1)
    public function pFisica()
    {
        return $this->belongsTo(PFisica::class, 'id');
    }
}
