<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Citas', function (Blueprint $table) {
            $table->id('IdCita');
            $table->dateTime('FechaCita');
            $table->dateTime('FechaRealizada');
            $table->unsignedBigInteger('IdCliente');
            $table->unsignedBigInteger('IdEmpleado');
            $table->foreign('IdCliente')->references('IdCliente')->on('Clientes');
            $table->foreign('IdEmpleado')->references('IdEmpleado')->on('Empleados');
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
        Schema::dropIfExists('Citas');
    }
}
