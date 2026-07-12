<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('inmueble_id');
            $table->string('fecha');
            $table->string('hora');
            $table->string('numero_personas')->nullable();
            $table->string('tipo_personas')->nullable();
            $table->string('trabajo')->nullable();
            $table->string('tipo_trabajo')->nullable();
            $table->string('estudiante')->nullable();
            $table->string('tipo_estudiante')->nullable();
            $table->string('comentario_persona')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visitas');
    }
}
