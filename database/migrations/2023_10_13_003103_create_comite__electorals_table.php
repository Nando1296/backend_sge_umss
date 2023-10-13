<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComiteElectoralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comite_electorals', function (Blueprint $table) { //comite__electorals
            $table->id('COD_COMITE');
            $table->string('COD_ADMIN', 30)->nullable();
            $table->integer('COD_TEU')->nullable();
            $table->integer('COD_ELECCION')->nullable();
            $table->string('CARGO_CE', 30);
            $table->date('FECHA_INI_CE')->nullable();
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
        Schema::dropIfExists('comite__electorals');
    }
}
