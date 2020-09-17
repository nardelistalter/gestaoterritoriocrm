<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->id();
            $table->string('cpf', 14)->nullable(true)->unique();
            $table->string('cnpj', 18)->nullable(true)->unique();
            $table->string('nome', 60)->nullable(false);
            $table->string('logradouro', 60)->nullable(false);
            $table->string('numero', 10)->nullable(false);
            $table->string('complemento', 45)->nullable(true);
            $table->string('bairro', 45)->nullable(false);
            $table->string('sexo', 15)->nullable(true)->default('NÃO INFORMADO');
            $table->string('telefone1', 15)->nullable(false);
            $table->string('telefone2', 15)->nullable(true);
            $table->string('email1', 255)->nullable(true);
            $table->string('email2', 255)->nullable(true);
            $table->dateTime('dataNascFund')->nullable(true);
            $table->boolean('status')->nullable(false)->default(false);
            $table->boolean('perfilAdministrador')->nullable(false)->default(false);
            $table->boolean('cliente')->nullable(false)->default(false);
            $table->boolean('funcionario')->nullable(false)->default(false);
            $table->integer('funcao')->nullable(true);
            $table->string('observacao', 255)->nullable(true);
            $table->unsignedBigInteger('municipio_id')->nullable(false);
            $table->timestamps();

            $table->foreign('municipio_id')->references('id')->on('municipios')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoas');
    }
}
