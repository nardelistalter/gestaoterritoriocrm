<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metas', function (Blueprint $table) {
            $table->id();
            $table->dateTime('dataPrevista')->nullable(false);
            $table->decimal('metaDesejada', 10, 2)->nullable(false)->default(0);
            $table->unsignedBigInteger('programaDeNegocio_id')->nullable(false);
            $table->unsignedBigInteger('grupoCliente_id')->nullable(false);
            $table->timestamps();

            $table->foreign('programaDeNegocio_id')->references('id')->on('programa_de_negocios')->onDelete('restrict');
            $table->foreign('grupoCliente_id')->references('id')->on('grupo_clientes')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('metas');
    }
}
