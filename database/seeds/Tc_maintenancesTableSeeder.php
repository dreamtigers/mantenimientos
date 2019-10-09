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
        DB::connection('piston')->table('tc_maintenances')->insert([
            array(
                'id' => '1',
                'name' => 'test',
                'type' => 'distance',
                'start' => '0',
                'period' => '7000',
                'attributes' => '{}'
            ),

            array(
                'id' => '2',
                'name' => 'Rutina 1',
                'type' => 'hours',
                'start' => '900000000',
                'period' => '86400000',
                'attributes' => '{}'
            ),

            array(
                'id' => '3',
                'name' => 'Rutina 2',
                'type' => 'hours',
                'start' => '1800000000',
                'period' => '86400000',
                'attributes' => '{}'
            ),

            array(
                'id' => '4',
                'name' => 'Rutina 3',
                'type' => 'hours',
                'start' => '3600000000',
                'period' => '86400000',
                'attributes' => '{}'
            ),

            array(
                'id' => '5',
                'name' => 'Rutina 4',
                'type' => 'hours',
                'start' => '7200000000',
                'period' => '86400000',
                'attributes' => '{}'
            )
        ]);
    }
}
