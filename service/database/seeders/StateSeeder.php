<?php

namespace Database\Seeders;

use App\Models\Address\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        State::create(['name' => 'Morelos']);
    }
}
