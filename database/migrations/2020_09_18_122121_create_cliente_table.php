<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 60)->nullable(false);
            $table->string('logradouro', 60)->nullable(false);
            $table->string('numero', 10)->nullable(false);
            $table->string('complemento', 45)->nullable(true);
            $table->string('bairro', 45)->nullable(false);
            $table->string('telefone1', 15)->nullable(false);
            $table->string('telefone2', 15)->nullable(true);
            $table->string('cpf', 14)->nullable(true)->unique();
            $table->string('cnpj', 18)->nullable(true)->unique();
            $table->string('email')->nullable(true);
            $table->dateTime('dataNascimento')->nullable(true);
            $table->string('sexo', 15)->nullable(true)->default('NÃO INFORMADO');
            $table->string('observacao', 255)->nullable(true);
            $table->unsignedBigInteger('municipio_id')->nullable(false);
            $table->unsignedBigInteger('visaPolitica_id')->unsigned()->nullable(true);
            $table->timestamps();

            $table->foreign('municipio_id')->references('id')->on('municipios')->onDelete('restrict');
            $table->foreign('visaPolitica_id')->references('id')->on('visao_politicas')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
