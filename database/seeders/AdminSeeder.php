<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Aksara',
            'email' => 'admin@aksaracoffee.com',
            'password' => bcrypt('Aksara26'),
            'is_admin' => true,
        ]);
    }
}
