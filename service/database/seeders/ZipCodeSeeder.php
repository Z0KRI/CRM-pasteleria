<?php

namespace Database\Seeders;

use App\Models\Address\City;
use App\Models\Address\ZipCode;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ZipCodeSeeder extends Seeder
{
    public function run(): void
    {
        $city = City::where('name', 'Cuernavaca')->first();

        ZipCode::create(['code' => '62000', 'city_id' => $city->id]);
    }
}
