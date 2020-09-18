<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePfisicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_fisicas', function (Blueprint $table) {
            $table->id();
            $table->string('cpf', 18)->nullable(false)->unique();
            $table->dateTime('dataNascimento')->nullable(true);
            $table->string('sexo', 15)->nullable(true)->default('NÃO INFORMADO');
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
        Schema::dropIfExists('p_fisicas');
    }
}
