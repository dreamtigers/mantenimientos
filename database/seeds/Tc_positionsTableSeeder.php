<?php

use Illuminate\Database\Seeder;

class Tc_positionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('piston')->table('tc_positions')->insert([
            array(
                'id' => '1',
                'protocol' => 'gps103',
                'deviceid' => '11',
                'servertime' => '2019-10-09 16:46:33',
                'devicetime' => '2019-10-09 16:46:25',
                'fixtime' => '2019-10-09 16:46:25',
                'valid' => 1,
                'latitude' => '9.727061666666666',
                'longitude' => '-63.210073333333334',
                'altitude' => '0',
                'speed' => '13.05',
                'course' => '0',
                'address' => NULL,
                'attributes' => '{"temp1":65,"distance":29.9,"totalDistance":8363307.99,"motion":true,"hours":22063000,"ignition":true}',
                'accuracy' => '0',
                'network' => 'null'
            ),
            array(
                'id' => '2',
                'protocol' => 'gps103',
                'deviceid' => '11',
                'servertime' => '2019-10-09 16:46:37',
                'devicetime' => '2019-10-09 16:46:29',
                'fixtime' => '2019-10-09 16:46:29',
                'valid' => 1,
                'latitude' => '9.727231666666666',
                'longitude' => '-63.20996',
                'altitude' => '0',
                'speed' => '10.43',
                'course' => '0',
                'address' => NULL,
                'attributes' => '{"temp1":11,"distance":22.64,"totalDistance":8363330.63,"motion":true,"hours":22063000,"ignition":true}',
                'accuracy' => '0',
                'network' => 'null'
            ),
            array(
                'id' => '3',
                'protocol' => 'gps103',
                'deviceid' => '11',
                'servertime' => '2019-10-09 16:46:41',
                'devicetime' => '2019-10-09 16:46:33',
                'fixtime' => '2019-10-09 16:46:33',
                'valid' => 1,
                'latitude' => '9.727386666666666',
                'longitude' => '-63.20999833333333',
                'altitude' => '0',
                'speed' => '8.12',
                'course' => '0',
                'address' => NULL,
                'attributes' => '{"temp1":331,"distance":17.76,"totalDistance":8363348.39,"motion":true,"hours":22063000,"ignition":true}',
                'accuracy' => '0',
                'network' => 'null'
            ),
            array(
                'id' => '4',
                'protocol' => 'gps103',
                'deviceid' => '12',
                'servertime' => '2019-10-09 16:46:55',
                'devicetime' => '2019-10-09 16:46:55',
                'fixtime' => '2019-10-09 11:55:39',
                'valid' => 1,
                'latitude' => '9.737571666666666',
                'longitude' => '-63.16266',
                'altitude' => '0',
                'speed' => '4.32',
                'course' => '0',
                'address' => NULL,
                'attributes' => '{"distance":0.0,"totalDistance":9270207.57,"motion":true,"hours":1764000000}',
                'accuracy' => '0',
                'network' => '{"radioType":"gsm","considerIp":false,"cellTowers":[{"cellId":51702,"locationAreaCode":56003,"mobileCountryCode":0,"mobileNetworkCode":0}]}'
            ),

            array(
                'id' => '5',
                'protocol' => 'gps103',
                'deviceid' => '11',
                'servertime' => '2019-10-09 16:47:10',
                'devicetime' => '2019-10-09 16:47:03',
                'fixtime' => '2019-10-09 16:47:03',
                'valid' => 1,
                'latitude' => '9.730761666666666',
                'longitude' => '-63.21207166666667',
                'altitude' => '0',
                'speed' => '38.59',
                'course' => '0',
                'address' => NULL,
                'attributes' => '{"temp1":332,"distance":439.21,"totalDistance":8363787.6,"motion":true,"hours":22063000,"ignition":true}',
                'accuracy' => '0',
                'network' => 'null'
            )
        ]);
    }
}
