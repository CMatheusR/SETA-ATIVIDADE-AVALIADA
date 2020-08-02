<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Disciplina extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disciplinas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->integer('num_bimestres');
            $table->float("peso_trabalho")->nullable($value = true);
            $table->float("peso_avaliacao")->nullable($value = true);
            $table->float("peso_prim_bim")->nullable($value = true);
            $table->float("peso_seg_bim")->nullable($value = true);
            $table->float("peso_ter_bim")->nullable($value = true);
            $table->float("peso_quar_bim")->nullable($value = true);
            $table->float("conceito_a")->nullable($value = true);
            $table->float("conceito_b")->nullable($value = true);
            $table->float("conceito_c")->nullable($value = true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disciplinas');
    }
}
