<?php

use Illuminate\Database\Seeder;

class RecordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('records')->insert([
            array(
                'performed_at' => '2019-09-13 16:20:00',
                'device_id' => '12',
                'maintenance_id' => '1',
                'position_id' => '1',
                'total_hours' => '3600000',
                'total_distance' => '100',
            ),

            array(
                'performed_at' => '2019-10-13 16:35:00',
                'device_id' => '11',
                'maintenance_id' => '4',
                'position_id' => '2',
                'total_hours' => '7200000001',
                'total_distance' => '14000',
            ),

            array(
                'performed_at' => '2019-10-13 16:20:00',
                'device_id' => '12',
                'maintenance_id' => '5',
                'position_id' => '3',
                'total_hours' => '7600000',
                'total_distance' => '5005',
            )
        ]);
    }
}
