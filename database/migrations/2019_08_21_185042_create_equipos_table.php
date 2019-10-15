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
        Schema::create('mt_equipos', function (Blueprint $table) {

            $table->bigIncrements('id');


            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('tc_users');

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
        Schema::dropIfExists('mt_equipos');
    }
}
