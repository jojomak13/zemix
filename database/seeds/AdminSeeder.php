<?php

use App\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'Joseph',
            'email' => 'jojo@test.com',
            'password' => bCrypt('123456')
        ]);

        factory(Admin::class, 15)->create();
    }
}
