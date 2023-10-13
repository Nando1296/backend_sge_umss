<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEleccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eleccions', function (Blueprint $table) {
            $table->id('COD_ELECCION');
            $table->string('COD_ADMIN', 30)->nullable();
            $table->integer('COD_FRENTE')->nullable();
            $table->integer('COD_TEU')->nullable();
            $table->integer('COD_COMITE')->nullable();
            $table->string('MOTIVO_ELECCION', 30);
            $table->date('FECHA_ELECCION');
            $table->date('FECHA_INI_CONVOCATORIA');
            $table->date('FECHA_FIN_CONVOCATORIA');
            $table->boolean('ELECCION_ACTIVA');
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
        Schema::dropIfExists('eleccions');
    }
}
