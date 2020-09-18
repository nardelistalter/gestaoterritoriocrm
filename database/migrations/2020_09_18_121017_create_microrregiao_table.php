<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMicrorregiaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('microrregiaos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 45)->nullable(false);
            $table->unsignedBigInteger('estado_id')->nullable(false);
            $table->timestamps();

            $table->foreign('estado_id')->references('id')->on('estados')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('microrregiaos');
    }
}
