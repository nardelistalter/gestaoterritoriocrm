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
            $table->unsignedBigInteger('pf_id')->nullable(true);
            $table->unsignedBigInteger('pj_id')->nullable(true);
            $table->string('observacao', 255)->nullable(true);
            $table->unsignedBigInteger('visaPolitica_id')->unsigned()->nullable(true);
            $table->timestamps();

            $table->foreign('pf_id')->references('id')->on('p_fisicas')->onDelete('restrict');
            $table->foreign('pj_id')->references('id')->on('p_juridicas')->onDelete('restrict');
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
