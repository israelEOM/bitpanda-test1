<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            [
                'name' => 'Austria',
                'iso2' => 'AT',
                'iso3' => 'AUT'
            ],
            [
                'name' => 'France',
                'iso2' => 'FR',
                'iso3' => 'FRA'
            ],
            [
                'name' => 'Germany',
                'iso2' => 'DE',
                'iso3' => 'DEU'
            ],
            [
                'name' => 'Spain',
                'iso2' => 'ES',
                'iso3' => 'ESP'
            ],
            [
                'name' => 'Russian Federation',
                'iso2' => 'RU',
                'iso3' => 'RUS'
            ],
            [
                'name' => 'China',
                'iso2' => 'CN',
                'iso3' => 'CHN'
            ]
        ]);
    }
}
