<?php

namespace Database\Seeders;

use App\Models\Address\ZipCode;
use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $zipCode = ZipCode::where('code', '62000')->first();

        Company::create([
            'name' => 'Albert Dely',
            'address' => 'Mi casa',
            'opening_date' => '2022-07-16',
            'rfc' => 'SAFD',
            'zip_code_id' => $zipCode->id,
        ]);
    }
}
