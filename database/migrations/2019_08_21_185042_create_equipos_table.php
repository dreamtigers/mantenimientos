<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->text('equipo');
            $table->integer('hrsMotor');
            $table->integer('hrsMantenimiento');
            $table->float('rutina1');
            $table->integer('hrsMant2');
            $table->integer('rutina2');
            $table->integer('hrsMant3');
            $table->float('rutina3');
            $table->integer('hrsMant4');
            $table->float('rutina4');

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
        Schema::dropIfExists('equipos');
    }
}
