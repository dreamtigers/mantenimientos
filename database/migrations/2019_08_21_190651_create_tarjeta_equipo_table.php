<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarjetaEquipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarjetaEquipo', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('device_id');
            $table->foreign('device_id')->references('id')->on('equipos');

            $table->string('tipoDeEquipo');
            $table->string('marca');
            $table->string('modelo');
            $table->string('serial');
            $table->integer('arreglo');
            $table->string('numeroPlaca');
            $table->integer('tipoMantenimiento');
            $table->text('actividades');
            $table->text('observaciones');
            $table->string('registradoPor');
            $table->date('fechaIngreso');
            $table->string('kilometrajeEnFecha');
            $table->integer('horasEnFecha');
            $table->integer('anoFabricacion');
            $table->string('ubicacion');

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
        Schema::dropIfExists('tarjetaEquipo');
    }
}
