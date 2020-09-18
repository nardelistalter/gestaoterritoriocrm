<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePjuridicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_juridicas', function (Blueprint $table) {
            $table->id();
            $table->string('cnpj', 18)->nullable(false)->unique();
            $table->dateTime('dataFundacao')->nullable(true);
            $table->unsignedBigInteger('pessoa_id')->nullable(false);
            $table->timestamps();

            $table->foreign('pessoa_id')->references('id')->on('pessoas')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('p_juridicas');
    }
}
