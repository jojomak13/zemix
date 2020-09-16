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
        $this->call(CitySeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(SellerSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(DriverSeeder::class);
    }
}
