<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramadenegocioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programa_de_negocios', function (Blueprint $table) {
            $table->id();
            $table->decimal('valorUnitario', 10, 2)->nullable(false);
            $table->dateTime('dataLimite')->nullable(false);
            $table->unsignedBigInteger('grupoProduto_id')->nullable(false);
            $table->unsignedBigInteger('safra_id')->nullable(false);
            $table->unsignedBigInteger('segmentoCultura_id')->nullable(false);
            $table->timestamps();

            $table->foreign('grupoProduto_id')->references('id')->on('grupo_produtos')->onDelete('restrict');
            $table->foreign('safra_id')->references('id')->on('safras')->onDelete('restrict');
            $table->foreign('segmentoCultura_id')->references('id')->on('segmento_culturas')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programa_de_negocios');
    }
}
