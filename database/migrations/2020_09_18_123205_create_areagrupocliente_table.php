<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreagrupoclienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_grupo_clientes', function (Blueprint $table) {
            $table->id();
            $table->decimal('qtdUnidadesArea', 10, 2)->nullable(false);
            $table->unsignedBigInteger('grupoCliente_id')->nullable(false);
            $table->unsignedBigInteger('segmentoCultura_id')->nullable(false);
            $table->unsignedBigInteger('municipio_id')->nullable(false);
            $table->timestamps();

            $table->foreign('grupoCliente_id')->references('id')->on('grupo_clientes')->onDelete('restrict');
            $table->foreign('segmentoCultura_id')->references('id')->on('segmento_culturas')->onDelete('restrict');
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
        Schema::dropIfExists('area_grupo_clientes');
    }
}
