<?php

use Illuminate\Database\Seeder;

class Tc_user_deviceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tc_user_device')->insert([
            array('userid' => '1','deviceid' => '5'),
            array('userid' => '1','deviceid' => '9'),
            array('userid' => '2','deviceid' => '11'),
            array('userid' => '2','deviceid' => '12')
        ]);
    }
}
