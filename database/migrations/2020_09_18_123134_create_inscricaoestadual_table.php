<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscricaoestadualTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscricao_estaduals', function (Blueprint $table) {
            $table->id();
            $table->string('numero', 45)->nullable(false);
            $table->string('localidade', 100)->nullable(false);
            $table->unsignedBigInteger('grupoCliente_id')->nullable(false);
            $table->unsignedBigInteger('cliente_id')->nullable(false);
            $table->unsignedBigInteger('municipio_id')->nullable(false);
            $table->timestamps();

            $table->foreign('grupoCliente_id')->references('id')->on('grupo_clientes')->onDelete('restrict');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('restrict');
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
        Schema::dropIfExists('inscricao_estaduals');
    }
}
