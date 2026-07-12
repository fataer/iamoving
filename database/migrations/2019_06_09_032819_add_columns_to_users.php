<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('fecha_nacimiento')->nullable()->default("");
            $table->string('sexo')->nullable()->default("");
            $table->string('trabajas')->nullable()->default("");
            $table->string('numero_mudar')->nullable()->default("");
            $table->string('comentario')->nullable()->default("");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('fecha_nacimiento');
            $table->dropColumn('sexo');
            $table->dropColumn('trabajas');
            $table->dropColumn('numero_mudar');
            $table->dropColumn('comentario');
        });
    }
}
