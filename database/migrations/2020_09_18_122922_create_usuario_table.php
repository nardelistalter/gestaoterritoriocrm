<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('senha', 255)->nullable(false);
            $table->boolean('status')->nullable(false)->default(false);
            $table->boolean('perfilAdministrador')->nullable(false)->default(false);
            $table->dateTime('ultimoAcesso')->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP(0)'));
            $table->unsignedBigInteger('funcionario_id')->unsigned()->nullable(true);
            $table->unsignedBigInteger('email_id')->nullable(false);
            $table->timestamps();

            $table->foreign('funcionario_id')->references('id')->on('funcionarios')->onDelete('restrict');
            $table->foreign('email_id')->references('id')->on('emails')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
