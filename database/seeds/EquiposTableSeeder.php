<?php

use Illuminate\Database\Seeder;

class EquiposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('equipos')->insert([
            array(
                'equipo' => 'Caja Magica',
                'hrsMotor' => '12',
                'hrsMantenimiento' => '12',
                'rutina1' => '242',
                'hrsMant2' => '12',
                'rutina2' => '492',
                'hrsMant3' => '12',
                'rutina3' => '992',
                'hrsMant4' => '12',
                'rutina4' => '1992'
            ),
            array(
                'equipo' => 'CamionetaPastorino',
                'hrsMotor' => '490',
                'hrsMantenimiento' => '490',
                'rutina1' => '250',
                'hrsMant2' => '490',
                'rutina2' => '500',
                'hrsMant3' => '490',
                'rutina3' => '1000',
                'hrsMant4' => '490',
                'rutina4' => '2000'
            ),
            array(
                'equipo' => 'Orinoco Yuli',
                'hrsMotor' => '6',
                'hrsMantenimiento' => '6',
                'rutina1' => '250',
                'hrsMant2' => '6',
                'rutina2' => '500',
                'hrsMant3' => '6',
                'rutina3' => '1000',
                'hrsMant4' => '6',
                'rutina4' => '2000'
            )
        ]);
    }
}
