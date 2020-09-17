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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->bigInteger('dui');
            $table->bigInteger('nit')->nullable();
            $table->string('direccion', 200);
            $table->integer('telefono');
            $table->string('rol');
            $table->string('cargo', 25);
            $table->string('estado', 25);
            $table->timestamps();// crea las columnas de updated_at y created_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}
