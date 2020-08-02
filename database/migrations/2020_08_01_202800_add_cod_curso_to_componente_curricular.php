<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCodCursoToComponenteCurricular extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('componentes_curriculares', function (Blueprint $table) {
            $table->unsignedBigInteger('cod_curso');
            $table->foreign('cod_curso')->references('id')->on('cursos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('componentes_curriculares', function (Blueprint $table) {
            $table->dropForeign(['cod_curso']);
            $table->dropColumn(['cod_curso']);
        });
    }
}
