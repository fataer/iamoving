<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnEstadoInmuebleToInformeDetalleCabecera extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('informe_detallado_cabecera', function (Blueprint $table) {
            $table->string('estado_inmueble')->nullable()->default("Disponible");
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
            $table->dropColumn('estado_inmueble');
        });
    }
}
