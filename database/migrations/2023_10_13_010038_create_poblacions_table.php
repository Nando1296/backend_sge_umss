<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoblacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poblacions', function (Blueprint $table) {
            $table->id('COD_SIS');
            $table->integer('COD_CANDIDATO')->nullable();
            $table->integer('COD_CARRERA')->nullable();
            $table->integer('COD_JURADO')->nullable();
            $table->integer('COD_COMITE')->nullable();
            $table->integer('COD_TEU')->nullable();
            $table->string('APELLIDOS', 30);
            $table->string('NOMBRES', 30);
            $table->integer('CI');
            $table->boolean('ESTUDIANTE');
            $table->boolean('DOCENTE');
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
        Schema::dropIfExists('poblacions');
    }
}
