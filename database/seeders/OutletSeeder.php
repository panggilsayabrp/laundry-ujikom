<?php

namespace Database\Seeders;

use App\Models\Outlet;
use Illuminate\Database\Seeder;

class OutletSeeder extends Seeder
{
    public function run()
    {
//        Outlet::factory(3)->create();
        Outlet::create([
            'outlet_name' => 'Outlet Maju',
            'outlet_address' => 'Jakarta Selatan',
            'outlet_phone' => '081289870965'
        ]);

        Outlet::create([
            'outlet_name' => 'Hoki Laundry',
            'outlet_address' => 'Jakarta Timur',
            'outlet_phone' => '081456789909'
        ]);

        Outlet::create([
            'outlet_name' => 'Laundry Aja',
            'outlet_address' => 'Jakarta Barat',
            'outlet_phone' => '087888190981'
        ]);
    }
}
