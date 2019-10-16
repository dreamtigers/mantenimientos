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
        $this->call(TcUsersTableSeeder::class);
        $this->call(TcMaintenancesTableSeeder::class);
        $this->call(TcDevicesTableSeeder::class);
        $this->call(TcPositionsTableSeeder::class);
        $this->call(TcUserDeviceTableSeeder::class);

        // Maintenances seeds
        $this->call(ActivitiesTableSeeder::class);
        $this->call(DetailsTableSeeder::class);
        $this->call(RecordsTableSeeder::class);
        $this->call(ActivityRecordTableSeeder::class);
        $this->call(ActivityMaintenanceTableSeeder::class);

        $this->call(EquiposTableSeeder::class);
    }
}
