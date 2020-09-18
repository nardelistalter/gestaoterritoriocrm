<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pf_id')->nullable(false);
            $table->dateTime('dataAdmissao')->nullable(false);
            $table->dateTime('dataDemissao')->nullable(true);
            $table->unsignedBigInteger('gerente_id')->unsigned()->nullable(true);
            $table->unsignedBigInteger('cargo_id')->nullable(false);
            $table->timestamps();

            $table->foreign('gerente_id')->references('id')->on('funcionarios')->onDelete('restrict');
            $table->foreign('pf_id')->references('id')->on('p_fisicas')->onDelete('restrict');
            $table->foreign('cargo_id')->references('id')->on('cargos')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcionarios');
    }
}
