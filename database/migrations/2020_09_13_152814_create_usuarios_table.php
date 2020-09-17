<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
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
            $table->unsignedBigInteger('pessoa_id')->nullable(false);
            $table->string('email', 255)->nullable(false)->unique();
            $table->string('senha', 255)->nullable(false);
            $table->boolean('status')->nullable(false)->default(false);
            $table->boolean('perfilAdministrador')->nullable(false)->default(false);
            $table->dateTime('ultimoAcesso')->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP(0)'));
            $table->boolean('hashRecovery')->nullable(true);
            $table->timestamps();

            //$table->primary('pessoa_id');
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
        Schema::dropIfExists('usuarios');
    }
}
