<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndustryVerticalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $industryVerticals = [
            ['name' => 'Agriculture'],
            ['name' => 'Automotive'],
            ['name' => 'Banking'],
            ['name' => 'Ecommerce / D2C'],
            ['name' => 'Telecommunications'],
            ['name' => 'Financial Services'],
            ['name' => 'FMCG'],
            ['name' => 'Policy & Government'],
            ['name' => 'Healthcare'],
            ['name' => 'Hospitality'],
            ['name' => 'Higher Education'],
            ['name' => 'Insurance'],
            ['name' => 'Logistics'],
            ['name' => 'Manufacturing'],
            ['name' => 'Media & Entertainment'],
            ['name' => 'Natural Resources'],
            ['name' => 'Teenage Kids'],
            ['name' => 'Real Estate'],
            ['name' => 'Restaurants'],
            ['name' => 'Retail - Offline'],
            ['name' => 'Technology'],
            ['name' => 'Transportation'],
            ['name' => 'Security & Intelligence'],
            ['name' => 'Other - Mention'],
        ];

        // Insert data into 'industry_verticals' table
        DB::table('industry_verticals')->insert($industryVerticals);
    }
}
