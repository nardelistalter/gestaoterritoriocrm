<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoaTable extends Migration
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
            $table->string('nome', 60)->nullable(false);
            $table->string('logradouro', 60)->nullable(false);
            $table->string('numero', 10)->nullable(false);
            $table->string('complemento', 45)->nullable(true);
            $table->string('bairro', 45)->nullable(false);
            $table->string('telefone1', 15)->nullable(false);
            $table->string('telefone2', 15)->nullable(true);
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
