<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
//        User::factory(5)->create();
        User::create([
            'name' => 'Clarissa Wijaya',
            'username' => 'clarissa',
            'password' => bcrypt('Password123'),
            'role' => 'admin',
            'outlet_id' => 1
        ]);

        User::create([
            'name' => 'Alberthus Luvikofic',
            'username' => 'pricetag12',
            'password' => bcrypt('Password123'),
            'role' => 'kasir',
            'outlet_id' => 2
        ]);

        User::create([
            'name' => 'Clara Reinston',
            'username' => 'olevicof',
            'password' => bcrypt('Password123'),
            'role' => 'owner',
            'outlet_id' => 2
        ]);
    }
}
