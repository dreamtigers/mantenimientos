<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistradoAntesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrado_antes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('nombre');
            $table->string('actividades');
            $table->string('marca');
            $table->string('modelo');
            $table->string('serial');
            $table->string('arreglo');
            $table->string('placa');
            $table->date('fecha');
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
        Schema::dropIfExists('registrado_antes');
    }
}
