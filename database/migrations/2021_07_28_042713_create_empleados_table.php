<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Empleados', function (Blueprint $table) {
            $table->id('IdEmpleado');
            $table->char('EmpleadoIdentidad', 15)->unique();
            $table->string('Nombre', 50);
            $table->string('Apellido', 50);
            $table->unsignedBigInteger('IdCargo');
            $table->unsignedBigInteger('IdUsuario');
            $table->foreign('IdCargo')->references('IdCargo')->on('Cargos');
            $table->foreign('IdUsuario')->references('IdUsuario')->on('Usuarios');
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
        Schema::dropIfExists('Empleados');
    }
}
