<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFiltroPosicionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filtroPosicion', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('deviceId');
            $table->foreign('deviceId')->references('id')->on('equipos');

            $table->string('nombre');
            $table->string('velocidad');

            # TODO: Change string for decimal(9,6)
            $table->string('latitud');
            $table->string('longitud');

            $table->string('distanciaRecorrida');
            $table->integer('horasMotor');
            $table->integer('updateNumber');

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
        Schema::dropIfExists('filtroPosicion');
    }
}
