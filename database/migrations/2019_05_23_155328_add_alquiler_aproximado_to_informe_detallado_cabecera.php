<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAlquilerAproximadoToInformeDetalladoCabecera extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('informe_detallado_cabecera', function (Blueprint $table) {
            $table->decimal('alquiler_aproximado',10,2)->nullable()->default(0);
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
            $table->dropColumn('alquiler_aproximado');
        });
    }
}
