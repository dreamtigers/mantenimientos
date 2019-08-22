<?php

use Illuminate\Database\Seeder;

class FiltroPosicionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('filtroPosicion')->insert([
            array('deviceId' => '1','nombre' => 'Caja Magica','velocidad' => '0','latitud' => '9.737631666666667','longitud' => '-63.163381666666666','distanciaRecorrida' => '1.6104 km.','horasMotor' => '12','updateNumber' => '82834'),
            array('deviceId' => '2','nombre' => 'CamionetaPastorino','velocidad' => '6.62','latitud' => '9.737561666666666','longitud' => '-63.162681666666664','distanciaRecorrida' => '7550.28222 km.','horasMotor' => '490','updateNumber' => '225622'),
            array('deviceId' => '1','nombre' => 'Maquina Soledad','velocidad' => '0','latitud' => '8.155348333333333','longitud' => '-63.581518333333335','distanciaRecorrida' => '6.38495 km.','horasMotor' => '0','updateNumber' => '224159'),
            array('deviceId' => '2','nombre' => 'Jhon','velocidad' => '0','latitud' => '9.7379817','longitud' => '-63.1634483','distanciaRecorrida' => '0.20628 km.','horasMotor' => '0','updateNumber' => '34353'),
            array('deviceId' => '3','nombre' => 'Celular Daniela','velocidad' => '0','latitud' => '9.7295054','longitud' => '-63.2116223','distanciaRecorrida' => '0.00463 km.','horasMotor' => '0','updateNumber' => '45949'),
            array('deviceId' => '3','nombre' => 'Orinoco Yuli','velocidad' => '0','latitud' => '9.752666666666666','longitud' => '-63.16881','distanciaRecorrida' => '5760.20641 km.','horasMotor' => '6','updateNumber' => '225621')
        ]);
    }
}
