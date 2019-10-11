<?php

use Illuminate\Database\Seeder;

class ActiviesTableSeeder extends Seeder
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
                'maintenanceId' => '1',
            ),

            array(
                'id' => '2',
                'description' => 'Revisión del nivel de aceite de mandos finales',
                'maintenanceId' => '1',
            ),

            array(
                'id' => '3',
                'description' => 'Inspeccionar y limpiar filtro de aire primario y vávula de descarga de polvo',
                'maintenanceId' => '1',
            ),

            array(
                'id' => '4',
                'description' => 'Revisar y limpiar filtro separador de agua de sistema combustible',
                'maintenanceId' => '1',
            ),

            array(
                'id' => '5',
                'description' => 'Revisión del nivel de electrolito y de los bornes de la batería',
                'maintenanceId' => '1',
            ),

            array(
                'id' => '6',
                'description' => 'Revisión de los niveles de aceite del sistema hidráulico y transmisión',
                'maintenanceId' => '1',
            ),

            array(
                'id' => '7',
                'description' => 'Revisión del nivel de refrigerante. Estado del radiador y mangueras',
                'maintenanceId' => '1',
            ),

            array(
                'id' => '8',
                'description' => 'Revisión del estado de la(s) correa(s) del motor y comprobar tensión',
                'maintenanceId' => '1',
            ),

            array(
                'id' => '9',
                'description' => 'Cambio de aceite y del filtro del motor',
                'maintenanceId' => '1',
            ),

            array(
                'id' => '10',
                'description' => 'Lubricar puntos de pivote de carador, excavadora y estabilizadores',
                'maintenanceId' => '1',
            ),

            array(
                'id' => '11',
                'description' => 'Lubricar crucetas de cardanes',
                'maintenanceId' => '1',
            ),

            array(
                'id' => '12',
                'description' => 'Revisión del estado y presión de neumáticos. Chequeo del apriete de tuercas',
                'maintenanceId' => '1',
            ),

            array(
                'id' => '13',
                'description' => 'Chequear líneas hidráulicas por fugas, desgaste, soportes flojos, etc.',
                'maintenanceId' => '1',
            ),

            array(
                'id' => '14',
                'description' => 'Chequeo del funcionamiento del sistema eléctrico y luces',
                'maintenanceId' => '1',
            ),

            array(
                'id' => '15',
                'description' => 'Limpieza general',
                'maintenanceId' => '1',
            ),

            array(
                'id' => '16',
                'description' => 'Revisión de la manguera de admisión de aire',
                'maintenanceId' => '2',
            ),

            array(
                'id' => '17',
                'description' => 'Cambio del filtro de aceite del sistema hidráulico',
                'maintenanceId' => '2',
            ),

            array(
                'id' => '18',
                'description' => 'Revisión del par de apriete del pasador entre el aguijón y el brazo',
                'maintenanceId' => '2',
            ),

            array(
                'id' => '19',
                'description' => 'Revisar funcionamiento de frenos de servicio y estacionamiento',
                'maintenanceId' => '2',
            ),

            array(
                'id' => '20',
                'description' => 'Cambio del filtro del combustible y separador de agua',
                'maintenanceId' => '2',
            ),

            array(
                'id' => '21',
                'description' => 'Cambio del filtro de la transmisión',
                'maintenanceId' => '2',
            ),

            array(
                'id' => '22',
                'description' => 'Cambio de aceite de eje delantero y trasero',
                'maintenanceId' => '3',
            ),

            array(
                'id' => '23',
                'description' => 'Revisión y ajuste del varillaje de control de velocidad del motor',
                'maintenanceId' => '3',
            ),

            array(
                'id' => '24',
                'description' => 'Cambio de aceite y filtros del sistema hidráulico',
                'maintenanceId' => '3',
            ),

            array(
                'id' => '25',
                'description' => 'Limpieza del tubo del respiradero del cárter del motor',
                'maintenanceId' => '3',
            ),

            array(
                'id' => '26',
                'description' => 'Cambio del aceite y filtro de la transmisión y convertidor de par',
                'maintenanceId' => '3',
            ),

            array(
                'id' => '27',
                'description' => 'Cambio de aceite de mandos finales',
                'maintenanceId' => '3',
            ),

            array(
                'id' => '28',
                'description' => 'Sustitución de los elementos de filtro de aire',
                'maintenanceId' => '3',
            ),

            array(
                'id' => '29',
                'description' => 'Drenaje y remplazo de refrigerante motor',
                'maintenanceId' => '4',
            ),

            array(
                'id' => '30',
                'description' => 'Ajuste del juego de válvulas del motor',
                'maintenanceId' => '4',
            )
        ]);
    }
}
