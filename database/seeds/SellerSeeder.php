<?php

use App\Seller;
use Illuminate\Database\Seeder;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Seller::create([
            'name' => 'Seller',
            'email' => 'jojo@seller.com',
            'password' => bCrypt('123456'),
            'address' => '119 Grant Fords West Mia, MS 70058-8620',
            'phone' => '851.408.6804 x714',
            'city_id' => 1,
            'company_name' => 'Jenkins, Goyette and Skiles',
            'is_active' => true
        ]);

        factory(Seller::class, 100)->create();
    }
}
