<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Traccar seeds
        $this->call(Tc_usersTableSeeder::class);
        $this->call(Tc_maintenancesTableSeeder::class);
        $this->call(Tc_devicesTableSeeder::class);
        $this->call(Tc_positionsTableSeeder::class);

        // Mantenimientos seeds
        $this->call(ActivitiesTableSeeder::class);
        $this->call(DetailsTableSeeder::class);

        $this->call(EquiposTableSeeder::class);
        $this->call(FiltroPosicionTableSeeder::class);
    }
}
