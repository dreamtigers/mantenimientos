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
        // Traccar users
        $this->call(Tc_usersTableSeeder::class);
        // Normal app info
        $this->call(EquiposTableSeeder::class);
        $this->call(FiltroPosicionTableSeeder::class);
        $this->call(Registrado_antesTableSeeder::class);
        $this->call(TarjetaEquipoTableSeeder::class);
    }
}
