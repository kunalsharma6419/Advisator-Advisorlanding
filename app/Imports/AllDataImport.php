<?php

namespace App\Imports;

use App\Models\User;
use App\Models\EmailVerification;
use App\Models\AdvisorNomination;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AllDataImport implements ToCollection, WithHeadingRow
{
    use Importable;
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            // Check if user exists
            $user = User::where('email', $row['email'])->first();

            if (!$user) {
                // Generate unique_id for new User
                $uniqueId = substr($row['name'], 0, 4) . rand(1000, 9999);

                // Create new User
                $user = User::create([
                    'unique_id' => $uniqueId,
                    'full_name' => $row['name'],
                    'email' => $row['email'],
                    'usertype' => 2,
                    'phone_number' => $row['phone_number'],
                    'is_verified' => 1,
                    'email_verified_at' => now(),
                    'password' => bcrypt('password'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                // Update existing User (without changing unique_id)
                $user->update([
                    'full_name' => $row['name'],
                    'phone_number' => $row['phone_number'],
                    'usertype' => 2,
                    'is_verified' => 1,
                    'email_verified_at' => now(),
                    'password' => bcrypt('password'),
                    'updated_at' => now(),
                ]);
            }

            // Import Email Verifications
            EmailVerification::updateOrCreate(
                ['email' => $row['email']],
                [
                    'otp' => rand(100000, 999999),
                    'created_at' => now()->timestamp,
                ]
            );

            // Generate nominee_id for AdvisorNomination
            $nomineeId = Str::random(12);
            // Filter and convert industry_ids
            $industryIds = array_filter([
                (string)$row['industry_vertical_option_1'],
                (string)$row['industry_vertical_option_2'],
                (string)$row['industry_vertical_option_3']
            ], fn($value) => !empty($value));

            // Filter and convert geography_ids
            $geographyIds = array_filter([
                (string)$row['location_option_1'],
                (string)$row['location_option_2'],
                (string)$row['location_option_3']
            ], fn($value) => !empty($value));

            // Import Advisor Nominations
            AdvisorNomination::updateOrCreate(
                ['email' => $row['email']],
                [
                    'nominee_id' => $nomineeId,
                    'user_id' => $user->unique_id, // Reference unique_id from User model
                    'full_name' => $row['name'],
                    'email' => $row['email'],
                    'mobile_number' => $row['phone_number'],
                    'location' => $row['location'],
                    'linkedin_profile' => $row['linkedin_profile'],
                    'business_function_category_id' => $row['select_business_function'],
                    'sub_function_category_id_1' => $row['sub_function_option_1'],
                    'sub_function_category_id_2' => $row['sub_function_option_2'],
                    // 'industry_ids' => json_encode([
                    //     $row['industry_vertical_option_1'],
                    //     $row['industry_vertical_option_2'],
                    //     $row['industry_vertical_option_3']
                    // ]),
                    // 'geography_ids' => json_encode([
                    //     $row['location_option_1'],
                    //     $row['location_option_2'],
                    //     $row['location_option_3']
                    // ]),
                    'industry_ids' => json_encode(array_values($industryIds), JSON_UNESCAPED_SLASHES),
                    'geography_ids' => json_encode(array_values($geographyIds), JSON_UNESCAPED_SLASHES),
                    'nominee_qualification' => $row['if_other_mention'] ?? null,
                    'nominee_experience' => null,  // Update if you have this data
                    'nominee_skills' => null,      // Update if you have this data
                    'discovery_call_price_per_minute' => null,  // Update if you have this data
                    'discovery_call_price_per_hour' => null,    // Update if you have this data
                    'conference_call_price_per_minute' => null, // Update if you have this data
                    'conference_call_price_per_hour' => null,   // Update if you have this data
                    'chat_price_per_minute' => null,            // Update if you have this data
                    'chat_price_per_hour' => null,              // Update if you have this data
                    'nomination_reason' => null,                // Update if you have this data
                    'nomination_status' => 'inprogress',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
