<?php

use Illuminate\Database\Seeder;

class Tc_usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tc_users')->insert([
            array(
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'hashedpassword' => '14a982b6baec6d4b8d8e6817493817efd8ecaf0a877145bd',
                'salt' => '5bc7446a257095633efaa480fc7ba80557dcf5ba8418d593',
                'readonly' => 0,
                'administrator' => 1,
                'map' => '',
                'latitude' => '9.737616',
                'longitude' => '-63.163396',
                'zoom' => '0',
                'twelvehourformat' => 0,
                'attributes' => '{}',
                'coordinateformat' => '',
                'disabled' => 0,
                'expirationtime' => NULL,
                'devicelimit' => '-1',
                'token' => NULL,
                'userlimit' => '0',
                'devicereadonly' => 0,
                'phone' => '',
                'limitcommands' => 0,
                'login' => '',
                'poilayer' => ''
            ),
            array(
                'name' => 'user',
                'email' => 'user@user.com',
                'hashedpassword' => '14a982b6baec6d4b8d8e6817493817efd8ecaf0a877145bd',
                'salt' => '5bc7446a257095633efaa480fc7ba80557dcf5ba8418d593',
                'readonly' => 0,
                'administrator' => 0,
                'map' => '',
                'latitude' => '9.737616',
                'longitude' => '-63.163396',
                'zoom' => '14',
                'twelvehourformat' => 0,
                'attributes' => '{"speedUnit":"kmh", "timezone":"Etc/GMT-4"}',
                'coordinateformat' => 'dd',
                'disabled' => 0,
                'expirationtime' => NULL,
                'devicelimit' => '-1',
                'token' => NULL,
                'userlimit' => '0',
                'devicereadonly' => 0,
                'phone' => '4249733776',
                'limitcommands' => 0,
                'login' => '',
                'poilayer' => ''
            )
        ]);
    }
}
