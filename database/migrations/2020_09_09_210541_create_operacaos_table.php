<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operacaos', function (Blueprint $table) {
            $table->id();
            $table->dateTime('data')->nullable(false);
            $table->string('numeroDocumento', 15)->nullable(false);
            $table->decimal('qtdUnidadesProduto', 10, 2)->nullable(false);
            $table->decimal('valorUnitario', 10, 2)->nullable(false)->default(0);
            $table->unsignedBigInteger('produto_id')->nullable(false);
            $table->unsignedBigInteger('inscricaoEstadual_id')->nullable(false);
            $table->timestamps();

            $table->foreign('produto_id')->references('id')->on('produtos')->onDelete('restrict');
            $table->foreign('inscricaoEstadual_id')->references('id')->on('inscricao_estaduals')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operacaos');
    }
}
