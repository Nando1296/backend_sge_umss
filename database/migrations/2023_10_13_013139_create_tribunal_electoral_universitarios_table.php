<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTribunalElectoralUniversitariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tribunal_electoral_universitarios', function (Blueprint $table) {
            $table->id('COD_TEU');
            $table->string('CARGO_TEU', 20);
            $table->date('FECHA_INI_TEU');
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
        Schema::dropIfExists('tribunal_electoral_universitarios');
    }
}
