<?php

use Illuminate\Database\Seeder;

class TarjetaEquipoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tarjetaEquipo')->insert([
            array(
                'id' => '301',
                'deviceId' => '2',
                'tipoDeEquipo' => 'CamionetaPastorino',
                'marca' => 'Camioneta',
                'modelo' => 'de2312',
                'serial' => 'algÃºn',
                'arreglo' => '12',
                'numeroPlaca' => 'P4$T0R',
                'tipoMantenimiento' => '3',
                'actividades' => ' RevisiÃ³n y ajuste del varillaje de control de velocidad del motor. Cambio de aceite y filtro del sistema hidrÃ¡ulico. Limpieza del tubo del respiradero del carter del motor. Cambio de aceite y filtro de la transmisiÃ³n y convertidor de par. Cambio de aceite de mandos finales. SustituciÃ³n de los elementos del filtro del aire.',
                'observaciones' => 'Soy una observaciÃ³n',
                'registradoPor' => 'Daniela Ruiz',
                'fechaIngreso' => '2019-07-09',
                'kilometrajeEnFecha' => '3918.88633 km.',
                'horasEnFecha' => '490',
                'anoFabricacion' => '1990',
                'ubicacion' => 'aca',
                'filtroAceiteMotor' => '12',
                'filtroAceiteHidraulico' => '1212',
                'filtroAirePrimario' => '12',
                'filtroAireSecundario' => '1212',
                'filtroTransmision' => '12',
                'filtroTanqueHidraulico' => '12',
                'filtroCombustiblePrimario' => '12',
                'filtroCombustibleSecundario' => '1',
                'filtroTanqueGasoil' => '112',
                'tipoAceiteHidraulico' => '12',
                'tipoAceiteMotor' => '12',
                'tipoAceiteTransmision' => '12',
                'tipoAceiteCaja' => '12',
                'capacidadCarterMotor' => '1212',
                'capacidadTanqueCaja' => '1212',
                'capacidadTanqueTransmision' => '121',
                'capacidadTanqueHidraulico' => '1212'
            ),
            array(
                'id' => '305',
                'deviceId' => '2',
                'tipoDeEquipo' => 'CamionetaPastorino',
                'marca' => 'Camioneta',
                'modelo' => 'de2312',
                'serial' => 'algÃºn',
                'arreglo' => '12',
                'numeroPlaca' => 'P4$T0R',
                'tipoMantenimiento' => '3',
                'actividades' => ' Cambio de aceite y filtro del sistema hidrÃ¡ulico. Limpieza del tubo del respiradero del carter del motor. Cambio de aceite y filtro de la transmisiÃ³n y convertidor de par. Cambio de aceite de mandos finales. SustituciÃ³n de los elementos del filtro del aire.',
                'observaciones' => 'hateful',
                'registradoPor' => 'Daniela Ruiz',
                'fechaIngreso' => '2019-07-09',
                'kilometrajeEnFecha' => '3929.27363 km.',
                'horasEnFecha' => '490',
                'anoFabricacion' => '11111',
                'ubicacion' => '1111111',
                'filtroAceiteMotor' => '11a',
                'filtroAceiteHidraulico' => 'q',
                'filtroAirePrimario' => 'a',
                'filtroAireSecundario' => 'q',
                'filtroTransmision' => 'q',
                'filtroTanqueHidraulico' => 'q',
                'filtroCombustiblePrimario' => 'q',
                'filtroCombustibleSecundario' => 'q',
                'filtroTanqueGasoil' => 'q',
                'tipoAceiteHidraulico' => 'q',
                'tipoAceiteMotor' => 'q',
                'tipoAceiteTransmision' => 'q',
                'tipoAceiteCaja' => 'q',
                'capacidadCarterMotor' => 'q',
                'capacidadTanqueCaja' => 'q',
                'capacidadTanqueTransmision' => 'q',
                'capacidadTanqueHidraulico' => 'q'
            ),
            array('id' => '313','deviceId' => '2','tipoDeEquipo' => 'CamionetaPastorino','marca' => 'Camioneta','modelo' => 'de2312','serial' => 'algÃºn','arreglo' => '12','numeroPlaca' => 'P4$T0R','tipoMantenimiento' => '1','actividades' => ' Lubricar crucetas de cardanes. RevisiÃ³n del estado y presiÃ³n de neumÃ¡ticos. Chequeo del apriete de tuercas. Chequeo de lineas hidrÃ¡ulicas por fugas, desgastes, etc. Chequeo del sistema elÃ©ctrico y luces. Limpieza general.','observaciones' => 'Each time it sounds better','registradoPor' => 'Daniela Ruiz','fechaIngreso' => '2019-07-08','kilometrajeEnFecha' => '4670.61392 km.','horasEnFecha' => '490','anoFabricacion' => '9','ubicacion' => '123','filtroAceiteMotor' => '21312','filtroAceiteHidraulico' => '3123','filtroAirePrimario' => '312312','filtroAireSecundario' => '312312','filtroTransmision' => '12312','filtroTanqueHidraulico' => '123','filtroCombustiblePrimario' => '3123','filtroCombustibleSecundario' => '312','filtroTanqueGasoil' => '12312','tipoAceiteHidraulico' => '12312','tipoAceiteMotor' => '2312312','tipoAceiteTransmision' => '3123','tipoAceiteCaja' => '312312','capacidadCarterMotor' => '123123','capacidadTanqueCaja' => '12312','capacidadTanqueTransmision' => '312312','capacidadTanqueHidraulico' => '3123123'),
            array('id' => '314','deviceId' => '2','tipoDeEquipo' => 'CamionetaPastorino','marca' => 'Camioneta','modelo' => 'de2312','serial' => 'algÃºn','arreglo' => '12','numeroPlaca' => 'P4$T0R','tipoMantenimiento' => '1','actividades' => ' RevisiÃ³n del nivel de electrolito y de los bornes de la baterÃ­a. RevisiÃ³n de niveles de aceite del sistemas hidrÃ¡ulico y transmisiÃ³n. RevisiÃ³n del nivel de refrigerante. Estado del radiador y mangueras. RevisiÃ³n del estado de la(s) correa(s) del motor y comprobar tensiÃ³n. Cambio de aceite y del filtro del motor. RevisiÃ³n del estado y presiÃ³n de neumÃ¡ticos. Chequeo del apriete de tuercas.','observaciones' => '312312','registradoPor' => 'Daniela Ruiz','fechaIngreso' => '2019-07-16','kilometrajeEnFecha' => '4670.61392 km.','horasEnFecha' => '490','anoFabricacion' => '123123','ubicacion' => '12312','filtroAceiteMotor' => '312312','filtroAceiteHidraulico' => '12312','filtroAirePrimario' => '3123','filtroAireSecundario' => '12312','filtroTransmision' => '123','filtroTanqueHidraulico' => '3123','filtroCombustiblePrimario' => '12312','filtroCombustibleSecundario' => '3123','filtroTanqueGasoil' => '3123','tipoAceiteHidraulico' => '3123','tipoAceiteMotor' => '12312','tipoAceiteTransmision' => '3123','tipoAceiteCaja' => '12312','capacidadCarterMotor' => '12312','capacidadTanqueCaja' => '123','capacidadTanqueTransmision' => '3123','capacidadTanqueHidraulico' => '12312'),
            array('id' => '317','deviceId' => '3','tipoDeEquipo' => 'Orinoco Yuli','marca' => 'Xecent','modelo' => 'Xelor','serial' => 'FullStr','arreglo' => '4','numeroPlaca' => 'Nuke1r','tipoMantenimiento' => '4','actividades' => '','observaciones' => 'Esta es una observaciÃ³n','registradoPor' => 'Daniela Ruiz','fechaIngreso' => '2019-07-09','kilometrajeEnFecha' => '2202.24162 km.','horasEnFecha' => '6','anoFabricacion' => '11111','ubicacion' => '111111','filtroAceiteMotor' => '123123','filtroAceiteHidraulico' => '3123123','filtroAirePrimario' => '123123','filtroAireSecundario' => '12312312','filtroTransmision' => '3123','filtroTanqueHidraulico' => '123123','filtroCombustiblePrimario' => '123','filtroCombustibleSecundario' => '123123','filtroTanqueGasoil' => '12312','tipoAceiteHidraulico' => '123123123','tipoAceiteMotor' => '12312','tipoAceiteTransmision' => '3123','tipoAceiteCaja' => '123123','capacidadCarterMotor' => '123','capacidadTanqueCaja' => '123123','capacidadTanqueTransmision' => '12312','capacidadTanqueHidraulico' => '312312'),
            array('id' => '320','deviceId' => '2','tipoDeEquipo' => 'CamionetaPastorino','marca' => 'Camioneta','modelo' => 'msoda123123s','serial' => 'algÃºn','arreglo' => '12','numeroPlaca' => 'P4$T0R','tipoMantenimiento' => '2','actividades' => ' RevisiÃ³n de la manguera de admisiÃ³n de aire. Cambio del filtro de aceite del sistema hidrÃ¡ulico.','observaciones' => 'sdasdasd','registradoPor' => 'Daniela Ruiz','fechaIngreso' => '2019-08-07','kilometrajeEnFecha' => '5702.19786 km.','horasEnFecha' => '490','anoFabricacion' => '19990','ubicacion' => 'asdasdasd','filtroAceiteMotor' => '1','filtroAceiteHidraulico' => '1','filtroAirePrimario' => '1','filtroAireSecundario' => '1','filtroTransmision' => '1','filtroTanqueHidraulico' => '1','filtroCombustiblePrimario' => '1','filtroCombustibleSecundario' => '1','filtroTanqueGasoil' => '1','tipoAceiteHidraulico' => '1','tipoAceiteMotor' => '1','tipoAceiteTransmision' => '1','tipoAceiteCaja' => '1','capacidadCarterMotor' => '1','capacidadTanqueCaja' => '1','capacidadTanqueTransmision' => '1','capacidadTanqueHidraulico' => '1'),
            array('id' => '321','deviceId' => '2','tipoDeEquipo' => 'CamionetaPastorino','marca' => 'Camioneta','modelo' => 'msoda123123s','serial' => 'algÃºn','arreglo' => '12','numeroPlaca' => 'P4$T0R','tipoMantenimiento' => '1','actividades' => ' RevisiÃ³n del nivel de refrigerante. Estado del radiador y mangueras. RevisiÃ³n del estado de la(s) correa(s) del motor y comprobar tensiÃ³n. Cambio de aceite y del filtro del motor. Lubricar puntos de pivote de cargadora, excavadora y estabilizadores.','observaciones' => 'asddas','registradoPor' => 'Daniela Ruiz','fechaIngreso' => '2019-08-07','kilometrajeEnFecha' => '5946.77717 km.','horasEnFecha' => '490','anoFabricacion' => '98','ubicacion' => 'ghfhg','filtroAceiteMotor' => '21321312','filtroAceiteHidraulico' => '12312312','filtroAirePrimario' => '12','filtroAireSecundario' => '123123','filtroTransmision' => '1312','filtroTanqueHidraulico' => '3123','filtroCombustiblePrimario' => '12312','filtroCombustibleSecundario' => '3123','filtroTanqueGasoil' => '123123','tipoAceiteHidraulico' => '123123213','tipoAceiteMotor' => '3123','tipoAceiteTransmision' => '12312312','tipoAceiteCaja' => '3123','capacidadCarterMotor' => '123','capacidadTanqueCaja' => '12312','capacidadTanqueTransmision' => '312312','capacidadTanqueHidraulico' => '3123123'),
            array('id' => '323','deviceId' => '2','tipoDeEquipo' => 'CamionetaPastorino','marca' => 'Camioneta','modelo' => 'de2312','serial' => 'algÃºn','arreglo' => '12','numeroPlaca' => 'P4$T0R','tipoMantenimiento' => '1','actividades' => ' RevisiÃ³n del estado de la(s) correa(s) del motor y comprobar tensiÃ³n. Cambio de aceite y del filtro del motor. Lubricar puntos de pivote de cargadora, excavadora y estabilizadores.','observaciones' => 'Observe','registradoPor' => 'Daniela Ruiz','fechaIngreso' => '2019-08-13','kilometrajeEnFecha' => '7161.57565 km.','horasEnFecha' => '490','anoFabricacion' => '1981','ubicacion' => '11111','filtroAceiteMotor' => '11','filtroAceiteHidraulico' => '11','filtroAirePrimario' => '11','filtroAireSecundario' => '11','filtroTransmision' => '111','filtroTanqueHidraulico' => '11','filtroCombustiblePrimario' => '11','filtroCombustibleSecundario' => '11','filtroTanqueGasoil' => '11','tipoAceiteHidraulico' => '11','tipoAceiteMotor' => '11','tipoAceiteTransmision' => '11','tipoAceiteCaja' => '11','capacidadCarterMotor' => '111','capacidadTanqueCaja' => '11','capacidadTanqueTransmision' => '11','capacidadTanqueHidraulico' => '11')
        ]);
    }
}
