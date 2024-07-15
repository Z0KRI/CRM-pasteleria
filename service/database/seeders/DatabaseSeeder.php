<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            StateSeeder::class,
            CitySeeder::class,
            ZipCodeSeeder::class
        ]);

        User::create(['name' => 'Super Admin', 'email' => 'admin@example.com', 'password' => Hash::make('password')]);
    }
}
