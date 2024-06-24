<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BusinessFunctionCategory;
use App\Models\SubFunctionCategory;

class BusinessFunctionCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Business Investments' => [
                'Angel Investors',
                'Govt Schemes / Agencies',
                'Venture Capitalist'
            ],
            'Business Legal' => [
                'Registration & Trademarks',
                'Compliances & Patents',
                'Contracts & Agreements',
                'Compliances'
            ],
            'Business Financial' => [
                'Accounting',
                'Taxation',
                'Audit'
            ],
            'IT Infrastructure' => [
                'On Premise',
                'Cloud',
                'Networking',
                'CyberSecurity'
            ],
            'Digital Platforms' => [
                'Web & Apps',
                'Softwares & Packages',
                'UI/UX/Content'
            ],
            'Data Management & Security' => [
                'Data Workflows',
                'Storage',
                'Data Summarization',
                'Data Security'
            ],
            'AI & Analytics' => [
                'Visualization',
                'Forecasting',
                'ML & Deep Learning',
                'Generative AI',
                'ML ops',
                'Visualization'
            ],
            'Digital Marketing' => [
                'Strategy',
                'Content',
                'SEO',
                'SMM',
                'PPC',
                'Performance Analytics'
            ],
            'Business Growth' => [
                'Customer Success Management',
                'Diversification',
                'Expansion - Domestic',
                'Expansion - International',
                'Market Research'
            ]
        ];

        foreach ($data as $businessFunction => $subFunctions) {
            $businessFunctionCategory = BusinessFunctionCategory::create(['name' => $businessFunction]);

            foreach ($subFunctions as $subFunction) {
                SubFunctionCategory::create([
                    'name' => $subFunction,
                    'business_function_category_id' => $businessFunctionCategory->id
                ]);
            }
        }
    }
}
