<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->id();
            $table->string('nome', 60)->nullable(false);
            $table->string('logradouro', 60)->nullable(false);
            $table->string('numero', 10)->nullable(false);
            $table->string('complemento', 45)->nullable(true);
            $table->string('bairro', 45)->nullable(false);
            $table->string('telefone1', 15)->nullable(false);
            $table->string('telefone2', 15)->nullable(true);
            $table->string('cpf', 14)->nullable(false)->unique();
            $table->dateTime('dataNascimento')->nullable(true);
            $table->string('sexo', 15)->nullable(true)->default('NÃO INFORMADO');
            $table->string('email')->unique()->nullable(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable(false);
            $table->rememberToken();
            $table->string('nome_image')->nullable(true);
            $table->binary('image')->nullable(true);
            $table->boolean('status')->nullable(false)->default(false);
            $table->boolean('perfilAdministrador')->nullable(false)->default(false);
            $table->dateTime('ultimoAcesso')->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP(0)'));
            $table->dateTime('dataAdmissao')->nullable(false);
            $table->dateTime('dataDemissao')->nullable(true);
            $table->unsignedBigInteger('municipio_id')->nullable(false);
            $table->unsignedBigInteger('gerente_id')->unsigned()->nullable(true);
            $table->unsignedBigInteger('cargo_id')->nullable(false);
            $table->timestamps();

            $table->foreign('municipio_id')->references('id')->on('municipios')->onDelete('restrict');
            $table->foreign('gerente_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('cargo_id')->references('id')->on('cargos')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
