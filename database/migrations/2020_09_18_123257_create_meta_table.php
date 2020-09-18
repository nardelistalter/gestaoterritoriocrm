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
            $table->integer('ano')->nullable(false);
            $table->integer('mes')->nullable(false);
            $table->decimal('participacaoDesejada', 5, 2)->nullable(false)->default(0);
            $table->unsignedBigInteger('grupoProduto_id')->nullable(false);
            $table->unsignedBigInteger('safra_id')->nullable(false);
            $table->unsignedBigInteger('grupoCliente_id')->nullable(false);
            $table->timestamps();

            $table->foreign('grupoProduto_id')->references('id')->on('grupo_produtos')->onDelete('restrict');
            $table->foreign('safra_id')->references('id')->on('safras')->onDelete('restrict');
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
