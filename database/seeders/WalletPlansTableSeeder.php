<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WalletPlans;

class WalletPlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plans = [
            [
                'plan_name' => 'Basic Plan',
                'plan_price' => 199,
                'plan_description' => 'Get started with a basic recharge pack to explore our platform\'s features.',
                'plan_features' => '<ul><li>Basic access to features</li><li>Limited support</li></ul>', // Rich text example
                'plan_status' => 'active',
            ],
            [
                'plan_name' => 'Premium',
                'plan_price' => 499,
                'plan_description' => 'Unlock premium features, exclusive content, and priority support with the premium plan.',
                'plan_features' => '<ul><li>Premium access to features</li><li>Exclusive content</li><li>Priority support</li></ul>',
                'plan_status' => 'active',
            ],
            [
                'plan_name' => 'Business Plan',
                'plan_price' => 999,
                'plan_description' => 'Designed for businesses looking for comprehensive solutions, team collaboration, and dedicated account management.',
                'plan_features' => '<ul><li>Team collaboration</li><li>Dedicated account management</li><li>Comprehensive solutions</li></ul>',
                'plan_status' => 'active',
            ],
            [
                'plan_name' => 'Standard',
                'plan_price' => 299,
                'plan_description' => 'Upgrade to the standard plan for expanded features and access to a wider range of content.',
                'plan_features' => '<ul><li>Expanded features</li><li>Wider range of content</li></ul>',
                'plan_status' => 'active',
            ],
            [
                'plan_name' => 'Professional Plan',
                'plan_price' => 799,
                'plan_description' => 'Ideal for professionals seeking advanced tools, analytics, and personalized support.',
                'plan_features' => '<ul><li>Advanced tools</li><li>Analytics</li><li>Personalized support</li></ul>',
                'plan_status' => 'active',
            ],
            [
                'plan_name' => 'Enterprise Plan',
                'plan_price' => 1299,
                'plan_description' => 'Tailored solutions for large enterprises, including advanced customization, dedicated support, and strategic guidance.',
                'plan_features' => '<ul><li>Advanced customization</li><li>Dedicated support</li><li>Strategic guidance</li></ul>',
                'plan_status' => 'active',
            ],
        ];

        foreach ($plans as $plan) {
            WalletPlans::create($plan);
        }
    }
}
