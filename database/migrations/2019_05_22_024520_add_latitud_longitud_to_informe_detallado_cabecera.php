<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLatitudLongitudToInformeDetalladoCabecera extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('informe_detallado_cabecera', function (Blueprint $table) {
            $table->string('latitud',100)->nullable();
            $table->string('longitud',100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('informe_detallado_cabecera', function (Blueprint $table) {
            $table->dropColumn('latitud');
            $table->dropColumn('longitud');
        });
    }
}
