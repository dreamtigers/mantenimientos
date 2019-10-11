<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('device_id');
            $table->foreign('device_id')->references('id')->on('dbpistongps.tc_devices');

            $table->string('marca');
            $table->string('serial');
            $table->string('arreglo');
            $table->string('placa');
            $table->integer('anoFabricacion');

            $table->string('filtroAceiteMotor');
            $table->string('filtroAceiteHidraulico');
            $table->string('filtroAirePrimario');
            $table->string('filtroAireSecundario');
            $table->string('filtroTransmision');
            $table->string('filtroTanqueHidraulico');
            $table->string('filtroCombustiblePrimario');
            $table->string('filtroCombustibleSecundario');
            $table->string('filtroTanqueGasoil');

            $table->string('tipoAceiteHidraulico');
            $table->string('tipoAceiteMotor');
            $table->string('tipoAceiteTransmision');
            $table->string('tipoAceiteCaja');

            $table->string('capacidadCarterMotor');
            $table->string('capacidadTanqueCaja');
            $table->string('capacidadTanqueTransmision');
            $table->string('capacidadTanqueHidraulico');

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
        Schema::dropIfExists('details');
    }
}
