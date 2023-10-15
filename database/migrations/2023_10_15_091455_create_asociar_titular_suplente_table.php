<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsociarTitularSuplenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asociar_titularSuplente', function (Blueprint $table) {
            $table->integer('idTS'); // Puedes cambiar esto a bigIncrements() si deseas autoincrementar
            $table->integer('COD_SIS');
            $table->integer('COD_COMITE');
            $table->integer('codTitular_Suplente');
            $table->timestamps(); // Opcional: Agrega created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asociar_titularSuplente');
    }
}
