<?php

use Illuminate\Database\Seeder;

class DetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('details')->insert([
            array(
                'device_id' => '5',
                'marca' => 'LastDone',
                'serial' => '1231231',
                'arreglo' => '2',
                'placa' => 'Single',
                'anoFabricacion' => '12312',
                'filtroAceiteMotor' => '12312',
                'filtroAceiteHidraulico' => '12312',
                'filtroAirePrimario' => '123123',
                'filtroAireSecundario' => '213123',
                'filtroTransmision' => '3123',
                'filtroTanqueHidraulico' => '12312',
                'filtroCombustiblePrimario' => '3123',
                'filtroCombustibleSecundario' => '123',
                'filtroTanqueGasoil' => '123123',
                'tipoAceiteHidraulico' => '312312',
                'tipoAceiteMotor' => '3123',
                'tipoAceiteTransmision' => '12312',
                'tipoAceiteCaja' => '3123',
                'capacidadCarterMotor' => '12312',
                'capacidadTanqueCaja' => '3123',
                'capacidadTanqueTransmision' => '123',
                'capacidadTanqueHidraulico' => '123123'
            ),

            array(
                'device_id' => '11',
                'marca' => 'Camioneta',
                'serial' => 'algÃºn',
                'arreglo' => '12',
                'placa' => 'P4$T0R',
                'anoFabricacion' => '1981',
                'filtroAceiteMotor' => '11',
                'filtroAceiteHidraulico' => '11',
                'filtroAirePrimario' => '11',
                'filtroAireSecundario' => '11',
                'filtroTransmision' => '111',
                'filtroTanqueHidraulico' => '11',
                'filtroCombustiblePrimario' => '11',
                'filtroCombustibleSecundario' => '11',
                'filtroTanqueGasoil' => '11',
                'tipoAceiteHidraulico' => '11',
                'tipoAceiteMotor' => '11',
                'tipoAceiteTransmision' => '11',
                'tipoAceiteCaja' => '11',
                'capacidadCarterMotor' => '111',
                'capacidadTanqueCaja' => '11',
                'capacidadTanqueTransmision' => '11',
                'capacidadTanqueHidraulico' => '11'
            ),

            array(
                'device_id' => '12',
                'marca' => 'Xecent',
                'serial' => 'FullStr',
                'arreglo' => '4',
                'placa' => 'Nuke1r',
                'anoFabricacion' => '11111',
                'filtroAceiteMotor' => '123123',
                'filtroAceiteHidraulico' => '3123123',
                'filtroAirePrimario' => '123123',
                'filtroAireSecundario' => '12312312',
                'filtroTransmision' => '3123',
                'filtroTanqueHidraulico' => '123123',
                'filtroCombustiblePrimario' => '123',
                'filtroCombustibleSecundario' => '123123',
                'filtroTanqueGasoil' => '12312',
                'tipoAceiteHidraulico' => '123123123',
                'tipoAceiteMotor' => '12312',
                'tipoAceiteTransmision' => '3123',
                'tipoAceiteCaja' => '123123',
                'capacidadCarterMotor' => '123',
                'capacidadTanqueCaja' => '123123',
                'capacidadTanqueTransmision' => '12312',
                'capacidadTanqueHidraulico' => '312312'
            )
        ]);
    }
}
