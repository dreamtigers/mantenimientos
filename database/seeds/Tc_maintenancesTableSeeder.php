<?php

use Illuminate\Database\Seeder;

class Tc_maintenancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('traccar')->table('tc_maintenances')->insert([
            array(
                'id' => '1',
                'name' => 'Rutina 1 Horas',
                'type' => 'hours',
                'start' => '0',
                'period' => '900000000',
                'attributes' => '{}'
            ),

            array(
                'id' => '2',
                'name' => 'Rutina 2 Horas',
                'type' => 'hours',
                'start' => '0',
                'period' => '1800000000',
                'attributes' => '{}'
            ),

            array(
                'id' => '3',
                'name' => 'Rutina 3 Horas',
                'type' => 'hours',
                'start' => '0',
                'period' => '3600000000',
                'attributes' => '{}'
            ),

            array(
                'id' => '4',
                'name' => 'Rutina 4 Horas',
                'type' => 'hours',
                'start' => '0',
                'period' => '7200000000',
                'attributes' => '{}'
            ),

            array(
                'id' => '5',
                'name' => 'Rutina 1 Distancia',
                'type' => 'distance',
                'start' => '0',
                'period' => '5000',
                'attributes' => '{}'
            ),

            array(
                'id' => '6',
                'name' => 'Rutina 2 Distancia',
                'type' => 'distance',
                'start' => '0',
                'period' => '10000',
                'attributes' => '{}'
            ),

            array(
                'id' => '7',
                'name' => 'Rutina 3 Distancia',
                'type' => 'distance',
                'start' => '0',
                'period' => '20000',
                'attributes' => '{}'
            ),

            array(
                'id' => '8',
                'name' => 'Rutina 4 Distancia',
                'type' => 'distance',
                'start' => '0',
                'period' => '40000',
                'attributes' => '{}'
            )
        ]);
    }
}
