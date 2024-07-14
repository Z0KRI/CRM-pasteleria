<?php

namespace Database\Seeders;

use App\Models\Address\City;
use App\Models\Address\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $state = State::where('name', 'Morelos')->first();

        City::create(['name' => 'Cuernavaca', 'state_id' => $state->id]);
    }
}
