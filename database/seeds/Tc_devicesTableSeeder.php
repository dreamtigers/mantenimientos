<?php

use Illuminate\Database\Seeder;

class Tc_devicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('traccar')->table('tc_devices')->insert([
            array(
                'id' => '5',
                'name' => 'Caja Magica',
                'uniqueid' => '868683027652506',
                'lastupdate' => '2019-07-02 09:53:49',
                'positionid' => '82834',
                'groupid' => NULL,
                'attributes' => '{}',
                'phone' => '04123201589',
                'model' => '',
                'contact' => '',
                'category' => NULL,
                'disabled' => 0
            ),

            array(
                'id' => '9',
                'name' => 'Jhon',
                'uniqueid' => '612537',
                'lastupdate' => '2019-06-18 06:40:51',
                'positionid' => '301894',
                'groupid' => NULL,
                'attributes' => '{}',
                'phone' => '',
                'model' => '',
                'contact' => '',
                'category' => NULL,
                'disabled' => 0
            ),

            array(
                'id' => '11',
                'name' => 'Orinoco Yuli',
                'uniqueid' => '868683027684392',
                'lastupdate' => '2019-10-09 05:34:03',
                'positionid' => '345474',
                'groupid' => NULL,
                'attributes' => '{}',
                'phone' => '04128690820',
                'model' => '',
                'contact' => '',
                'category' => NULL,
                'disabled' => 0
            ),

            array(
                'id' => '12',
                'name' => 'Patineta',
                'uniqueid' => '868683027650427',
                'lastupdate' => '2019-10-09 01:35:45',
                'positionid' => '344807',
                'groupid' => NULL,
                'attributes' => '{}',
                'phone' => '04123201586',
                'model' => '',
                'contact' => '',
                'category' => 'car',
                'disabled' => 0
            )
        ]);
    }
}
