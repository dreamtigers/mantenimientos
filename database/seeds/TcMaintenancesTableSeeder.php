<?php

use Illuminate\Database\Seeder;

class TcMaintenancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tc_maintenances')->insert([
            array(
                'name' => 'Rutina 1 Horas',
                'type' => 'hours',
                'start' => '0',
                'period' => '900000000',
                'attributes' => '{}'
            ),

            array(
                'name' => 'Rutina 2 Horas',
                'type' => 'hours',
                'start' => '0',
                'period' => '1800000000',
                'attributes' => '{}'
            ),

            array(
                'name' => 'Rutina 3 Horas',
                'type' => 'hours',
                'start' => '0',
                'period' => '3600000000',
                'attributes' => '{}'
            ),

            array(
                'name' => 'Rutina 4 Horas',
                'type' => 'hours',
                'start' => '0',
                'period' => '7200000000',
                'attributes' => '{}'
            ),

            array(
                'name' => 'Rutina 1 Distancia',
                'type' => 'distance',
                'start' => '0',
                'period' => '5000',
                'attributes' => '{}'
            ),

            array(
                'name' => 'Rutina 2 Distancia',
                'type' => 'distance',
                'start' => '0',
                'period' => '10000',
                'attributes' => '{}'
            ),

            array(
                'name' => 'Rutina 3 Distancia',
                'type' => 'distance',
                'start' => '0',
                'period' => '20000',
                'attributes' => '{}'
            ),

            array(
                'name' => 'Rutina 4 Distancia',
                'type' => 'distance',
                'start' => '0',
                'period' => '40000',
                'attributes' => '{}'
            )
        ]);
    }
}
