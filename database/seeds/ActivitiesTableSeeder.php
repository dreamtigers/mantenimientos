<?php

use Illuminate\Database\Seeder;

class ActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mt_activities')->insert([
            array(
                'id' => '1',
                'description' => 'Revisión del nivel de aceite de eje trasero y delantero (TDM)',
            ),

            array(
                'id' => '2',
                'description' => 'Revisión del nivel de aceite de mandos finales',
            ),

            array(
                'id' => '3',
                'description' => 'Inspeccionar y limpiar filtro de aire primario y vávula de descarga de polvo',
            ),

            array(
                'id' => '4',
                'description' => 'Revisar y limpiar filtro separador de agua de sistema combustible',
            ),

            array(
                'id' => '5',
                'description' => 'Revisión del nivel de electrolito y de los bornes de la batería',
            ),

            array(
                'id' => '6',
                'description' => 'Revisión de los niveles de aceite del sistema hidráulico y transmisión',
            ),

            array(
                'id' => '7',
                'description' => 'Revisión del nivel de refrigerante. Estado del radiador y mangueras',
            ),

            array(
                'id' => '8',
                'description' => 'Revisión del estado de la(s) correa(s) del motor y comprobar tensión',
            ),

            array(
                'id' => '9',
                'description' => 'Cambio de aceite y del filtro del motor',
            ),

            array(
                'id' => '10',
                'description' => 'Lubricar puntos de pivote de carador, excavadora y estabilizadores',
            ),

            array(
                'id' => '11',
                'description' => 'Lubricar crucetas de cardanes',
            ),

            array(
                'id' => '12',
                'description' => 'Revisión del estado y presión de neumáticos. Chequeo del apriete de tuercas',
            ),

            array(
                'id' => '13',
                'description' => 'Chequear líneas hidráulicas por fugas, desgaste, soportes flojos, etc.',
            ),

            array(
                'id' => '14',
                'description' => 'Chequeo del funcionamiento del sistema eléctrico y luces',
            ),

            array(
                'id' => '15',
                'description' => 'Limpieza general',
            ),

            array(
                'id' => '16',
                'description' => 'Revisión de la manguera de admisión de aire',
            ),

            array(
                'id' => '17',
                'description' => 'Cambio del filtro de aceite del sistema hidráulico',
            ),

            array(
                'id' => '18',
                'description' => 'Revisión del par de apriete del pasador entre el aguijón y el brazo',
            ),

            array(
                'id' => '19',
                'description' => 'Revisar funcionamiento de frenos de servicio y estacionamiento',
            ),

            array(
                'id' => '20',
                'description' => 'Cambio del filtro del combustible y separador de agua',
            ),

            array(
                'id' => '21',
                'description' => 'Cambio del filtro de la transmisión',
            ),

            array(
                'id' => '22',
                'description' => 'Cambio de aceite de eje delantero y trasero',
            ),

            array(
                'id' => '23',
                'description' => 'Revisión y ajuste del varillaje de control de velocidad del motor',
            ),

            array(
                'id' => '24',
                'description' => 'Cambio de aceite y filtros del sistema hidráulico',
            ),

            array(
                'id' => '25',
                'description' => 'Limpieza del tubo del respiradero del cárter del motor',
            ),

            array(
                'id' => '26',
                'description' => 'Cambio del aceite y filtro de la transmisión y convertidor de par',
            ),

            array(
                'id' => '27',
                'description' => 'Cambio de aceite de mandos finales',
            ),

            array(
                'id' => '28',
                'description' => 'Sustitución de los elementos de filtro de aire',
            ),

            array(
                'id' => '29',
                'description' => 'Drenaje y remplazo de refrigerante motor',
            ),

            array(
                'id' => '30',
                'description' => 'Ajuste del juego de válvulas del motor',
            ),

            array(
                'id' => '31',
                'description' => 'Revisar del estado de la(s) correa(s) del motor y comprobar tensión',
            ),

            array(
                'id' => '32',
                'description' => 'Inspeccionar y limpiar filtro de aire',
            ),

            array(
                'id' => '33',
                'description' => 'Revisar nivel de electrólito y de los bornes de la batería.',
            ),

            array(
                'id' => '34',
                'description' => 'Chequear niveles de aceite de la caja velocidades automatica  (Si aplica)',
            ),

            array(
                'id' => '35',
                'description' => 'Revisar nivel de refrigerante. Estado del radiador y mangueras',
            ),

            array(
                'id' => '36',
                'description' => 'Revisar estado y presion de inflado de cauchos. Chequeo del apriete de tuercas',
            ),

            array(
                'id' => '37',
                'description' => 'Cambiar de aceite y del filtro del motor',
            ),

            array(
                'id' => '38',
                'description' => 'Chequear funcionamiento del sistema electrico, luces e instrumentos',
            ),

            array(
                'id' => '39',
                'description' => 'Chequear frenos de servicio y estacionamiento',
            ),

            array(
                'id' => '40',
                'description' => 'Chequear fugas de agua, aceite y combustible',
            ),

            array(
                'id' => '41',
                'description' => 'Limpieza General, lavado y engrase',
            ),

            array(
                'id' => '42',
                'description' => 'Chequear graduación de embrague (Si Aplica)',
            ),

            array(
                'id' => '43',
                'description' => 'Cambiar filtros de combustible',
            ),

            array(
                'id' => '44',
                'description' => 'Realizar alineacion y balanceo cauchos',
            ),

            array(
                'id' => '45',
                'description' => 'Chequear sistema de dirección, falta de ajuste, estado de articulaciones, rotulas, protectores, etc',
            ),

            array(
                'id' => '46',
                'description' => 'Chequear sistema de suspensión, condicion de amortiguadores, falta de ajuste en conexiones, etc',
            ),

            array(
                'id' => '47',
                'description' => 'Limpiar filtro aire de cabina o antipolen del sistema de A/A',
            ),

            array(
                'id' => '48',
                'description' => 'Chequear nivel de aceite de caja de velocidades mecanica (Si Aplica)',
            ),

            array(
                'id' => '49',
                'description' => 'Reemplazar filtro de aire',
            ),

            array(
                'id' => '50',
                'description' => 'Chequear condición y funcionamiento de alternador y arranque',
            ),

            array(
                'id' => '51',
                'description' => 'Reemplazar filtro y aceite de caja de velocidades automatica (Si Aplica)',
            ),

            array(
                'id' => '52',
                'description' => 'Rotar cauchos',
            ),

            array(
                'id' => '53',
                'description' => 'Realizar limpieza y mantenimiento del sistema de frenos. Chequear desgaste de pastillas y bandas',
            ),

            array(
                'id' => '54',
                'description' => 'Verificar funciomiento de sistema A/A. Presion de Gas Refrigerante. Reemplazar filtro de aire cabina',
            ),

            array(
                'id' => '55',
                'description' => 'Drenaje y reemplazo de refrigerante motor',
            ),

            array(
                'id' => '56',
                'description' => 'Ajuste del juego de válvulas del motor. Chequear compresion de motor',
            ),

            array(
                'id' => '57',
                'description' => 'Cambiar correa(s) del motor',
            ),

            array(
                'id' => '58',
                'description' => 'Reemplazar Bujias. Verificar estado de cables',
            ),

            array(
                'id' => '59',
                'description' => 'Chequear sistema de inyección (Si aplica)',
            ),

            array(
                'id' => '60',
                'description' => 'Reemplazar aceite de caja de velocidades mecanicas y gomas protectoras',
            )

        ]);
    }
}
