<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades_areas', function (Blueprint $table) {
            $table->id();
            $table->decimal('qtdArea', 10, 2)->nullable(false);
            $table->string('unidadeMedida', 45)->nullable(false);
            $table->decimal('mktShareDesejado', 5, 2)->nullable(true);
            $table->string('observacao', 100)->nullable(true);
            $table->unsignedBigInteger('municipio_id')->nullable(false);
            $table->unsignedBigInteger('segmentoCultura_id')->nullable(false);
            $table->timestamps();

            $table->foreign('municipio_id')->references('id')->on('municipios')->onDelete('restrict');
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
        Schema::dropIfExists('unidades_areas');
    }
}
