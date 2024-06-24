<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeographyLocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = [
            ['name' => 'India'],
            ['name' => 'Australia'],
            ['name' => 'Singapore'],
            ['name' => 'China'],
            ['name' => 'APAC - Other'],
            ['name' => 'Canada'],
            ['name' => 'Europe'],
            ['name' => 'Middle East'],
            ['name' => 'Africa'],
            ['name' => 'United States'],
        ];

        // Insert data into 'geography_locations' table
        DB::table('geography_locations')->insert($locations);
    }
}
