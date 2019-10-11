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
            )
        ]);
    }
}
