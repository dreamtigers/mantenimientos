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
        DB::table('activities')->insert([
            array(
                'id' => '1',
                'description' => 'Revisión del nivel de aceite de eje trasero y delantero (TDM)',
                'maintenance_id' => '1',
            ),

            array(
                'id' => '2',
                'description' => 'Revisión del nivel de aceite de mandos finales',
                'maintenance_id' => '1',
            ),

            array(
                'id' => '3',
                'description' => 'Inspeccionar y limpiar filtro de aire primario y vávula de descarga de polvo',
                'maintenance_id' => '1',
            ),

            array(
                'id' => '4',
                'description' => 'Revisar y limpiar filtro separador de agua de sistema combustible',
                'maintenance_id' => '1',
            ),

            array(
                'id' => '5',
                'description' => 'Revisión del nivel de electrolito y de los bornes de la batería',
                'maintenance_id' => '1',
            ),

            array(
                'id' => '6',
                'description' => 'Revisión de los niveles de aceite del sistema hidráulico y transmisión',
                'maintenance_id' => '1',
            ),

            array(
                'id' => '7',
                'description' => 'Revisión del nivel de refrigerante. Estado del radiador y mangueras',
                'maintenance_id' => '1',
            ),

            array(
                'id' => '8',
                'description' => 'Revisión del estado de la(s) correa(s) del motor y comprobar tensión',
                'maintenance_id' => '1',
            ),

            array(
                'id' => '9',
                'description' => 'Cambio de aceite y del filtro del motor',
                'maintenance_id' => '1',
            ),

            array(
                'id' => '10',
                'description' => 'Lubricar puntos de pivote de carador, excavadora y estabilizadores',
                'maintenance_id' => '1',
            ),

            array(
                'id' => '11',
                'description' => 'Lubricar crucetas de cardanes',
                'maintenance_id' => '1',
            ),

            array(
                'id' => '12',
                'description' => 'Revisión del estado y presión de neumáticos. Chequeo del apriete de tuercas',
                'maintenance_id' => '1',
            ),

            array(
                'id' => '13',
                'description' => 'Chequear líneas hidráulicas por fugas, desgaste, soportes flojos, etc.',
                'maintenance_id' => '1',
            ),

            array(
                'id' => '14',
                'description' => 'Chequeo del funcionamiento del sistema eléctrico y luces',
                'maintenance_id' => '1',
            ),

            array(
                'id' => '15',
                'description' => 'Limpieza general',
                'maintenance_id' => '1',
            ),

            array(
                'id' => '16',
                'description' => 'Revisión de la manguera de admisión de aire',
                'maintenance_id' => '2',
            ),

            array(
                'id' => '17',
                'description' => 'Cambio del filtro de aceite del sistema hidráulico',
                'maintenance_id' => '2',
            ),

            array(
                'id' => '18',
                'description' => 'Revisión del par de apriete del pasador entre el aguijón y el brazo',
                'maintenance_id' => '2',
            ),

            array(
                'id' => '19',
                'description' => 'Revisar funcionamiento de frenos de servicio y estacionamiento',
                'maintenance_id' => '2',
            ),

            array(
                'id' => '20',
                'description' => 'Cambio del filtro del combustible y separador de agua',
                'maintenance_id' => '2',
            ),

            array(
                'id' => '21',
                'description' => 'Cambio del filtro de la transmisión',
                'maintenance_id' => '2',
            ),

            array(
                'id' => '22',
                'description' => 'Cambio de aceite de eje delantero y trasero',
                'maintenance_id' => '3',
            ),

            array(
                'id' => '23',
                'description' => 'Revisión y ajuste del varillaje de control de velocidad del motor',
                'maintenance_id' => '3',
            ),

            array(
                'id' => '24',
                'description' => 'Cambio de aceite y filtros del sistema hidráulico',
                'maintenance_id' => '3',
            ),

            array(
                'id' => '25',
                'description' => 'Limpieza del tubo del respiradero del cárter del motor',
                'maintenance_id' => '3',
            ),

            array(
                'id' => '26',
                'description' => 'Cambio del aceite y filtro de la transmisión y convertidor de par',
                'maintenance_id' => '3',
            ),

            array(
                'id' => '27',
                'description' => 'Cambio de aceite de mandos finales',
                'maintenance_id' => '3',
            ),

            array(
                'id' => '28',
                'description' => 'Sustitución de los elementos de filtro de aire',
                'maintenance_id' => '3',
            ),

            array(
                'id' => '29',
                'description' => 'Drenaje y remplazo de refrigerante motor',
                'maintenance_id' => '4',
            ),

            array(
                'id' => '30',
                'description' => 'Ajuste del juego de válvulas del motor',
                'maintenance_id' => '4',
            ),

            array(
                'id' => '31',
                'description' => 'Revisar del estado de la(s) correa(s) del motor y comprobar tensión',
                'maintenance_id' => '5',
            ),

            array(
                'id' => '32',
                'description' => 'Inspeccionar y limpiar filtro de aire',
                'maintenance_id' => '5',
            ),

            array(
                'id' => '33',
                'description' => 'Revisar nivel de electrólito y de los bornes de la batería.',
                'maintenance_id' => '5',
            ),

            array(
                'id' => '34',
                'description' => 'Chequear niveles de aceite de la caja velocidades automatica  (Si aplica)',
                'maintenance_id' => '5',
            ),

            array(
                'id' => '35',
                'description' => 'Revisar nivel de refrigerante. Estado del radiador y mangueras',
                'maintenance_id' => '5',
            ),

            array(
                'id' => '36',
                'description' => 'Revisar estado y presion de inflado de cauchos. Chequeo del apriete de tuercas',
                'maintenance_id' => '5',
            ),

            array(
                'id' => '37',
                'description' => 'Cambiar de aceite y del filtro del motor',
                'maintenance_id' => '5',
            ),

            array(
                'id' => '38',
                'description' => 'Chequear funcionamiento del sistema electrico, luces e instrumentos',
                'maintenance_id' => '5',
            ),

            array(
                'id' => '39',
                'description' => 'Chequear frenos de servicio y estacionamiento',
                'maintenance_id' => '5',
            ),

            array(
                'id' => '40',
                'description' => 'Chequear fugas de agua, aceite y combustible',
                'maintenance_id' => '5',
            ),

            array(
                'id' => '41',
                'description' => 'Limpieza General, lavado y engrase',
                'maintenance_id' => '5',
            ),

            array(
                'id' => '42',
                'description' => 'Chequear graduación de embrague (Si Aplica)',
                'maintenance_id' => '6',
            ),

            array(
                'id' => '43',
                'description' => 'Cambiar filtros de combustible',
                'maintenance_id' => '6',
            ),

            array(
                'id' => '44',
                'description' => 'Realizar alineacion y balanceo cauchos',
                'maintenance_id' => '6',
            ),

            array(
                'id' => '45',
                'description' => 'Chequear sistema de dirección, falta de ajuste, estado de articulaciones, rotulas, protectores, etc',
                'maintenance_id' => '6',
            ),

            array(
                'id' => '46',
                'description' => 'Chequear sistema de suspensión, condicion de amortiguadores, falta de ajuste en conexiones, etc',
                'maintenance_id' => '6',
            ),

            array(
                'id' => '47',
                'description' => 'Limpiar filtro aire de cabina o antipolen del sistema de A/A',
                'maintenance_id' => '6',
            ),

            array(
                'id' => '48',
                'description' => 'Chequear nivel de aceite de caja de velocidades mecanica (Si Aplica)',
                'maintenance_id' => '6',
            ),

            array(
                'id' => '49',
                'description' => 'Reemplazar filtro de aire',
                'maintenance_id' => '7',
            ),

            array(
                'id' => '50',
                'description' => 'Chequear condición y funcionamiento de alternador y arranque',
                'maintenance_id' => '7',
            ),

            array(
                'id' => '51',
                'description' => 'Reemplazar filtro y aceite de caja de velocidades automatica (Si Aplica)',
                'maintenance_id' => '7',
            ),

            array(
                'id' => '52',
                'description' => 'Rotar cauchos',
                'maintenance_id' => '7',
            ),

            array(
                'id' => '53',
                'description' => 'Realizar limpieza y mantenimiento del sistema de frenos. Chequear desgaste de pastillas y bandas',
                'maintenance_id' => '7',
            ),

            array(
                'id' => '54',
                'description' => 'Verificar funciomiento de sistema A/A. Presion de Gas Refrigerante. Reemplazar filtro de aire cabina',
                'maintenance_id' => '7',
            ),

            array(
                'id' => '55',
                'description' => 'Drenaje y reemplazo de refrigerante motor',
                'maintenance_id' => '8',
            ),

            array(
                'id' => '56',
                'description' => 'Ajuste del juego de válvulas del motor. Chequear compresion de motor',
                'maintenance_id' => '8',
            ),

            array(
                'id' => '57',
                'description' => 'Cambiar correa(s) del motor',
                'maintenance_id' => '8',
            ),

            array(
                'id' => '58',
                'description' => 'Reemplazar Bujias. Verificar estado de cables',
                'maintenance_id' => '8',
            ),

            array(
                'id' => '59',
                'description' => 'Chequear sistema de inyección (Si aplica)',
                'maintenance_id' => '8',
            ),

            array(
                'id' => '60',
                'description' => 'Reemplazar aceite de caja de velocidades mecanicas y gomas protectoras',
                'maintenance_id' => '8',
            )

        ]);
    }
}
