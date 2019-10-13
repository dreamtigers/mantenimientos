<?php

use Illuminate\Database\Seeder;

class Activity_recordTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('activity_record')->insert([
            array(
                'record_id' => '1',
                'activity_id' => '11',
                'observation' => 'Aaaay vale, y que te lubrican el cardán',
            ),

            array(
                'record_id' => '1',
                'activity_id' => '12',
                'observation' => 'Neumáticos buenos.',
            ),

            array(
                'record_id' => '1',
                'activity_id' => '15',
                'observation' => 'Vehículo limpiado',
            ),

            array(
                'record_id' => '2',
                'activity_id' => '29',
                'observation' => 'Ajustadas las válvulas',
            ),

            array(
                'record_id' => '3',
                'activity_id' => '31',
                'observation' => 'Correas del motor buenas',
            )
        ]);
    }
}
