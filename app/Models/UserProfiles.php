<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\IndustryVertical;

class UserProfiles extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'industry_ids' => 'array',
    ];

    protected $fillable = [
        'user_id', 'full_name', 'email','profile_photo_path', 'mobile_number', 'location',
        'business_function_category_id', 'sub_function_category_id_1',
        'sub_function_category_id_2', 'industry_ids', 'about', 'is_founder', 'profile_completion_percentage'
    ];

    public function businessFunctionCategory()
    {
        return $this->belongsTo(BusinessFunctionCategory::class);
    }

    public function subFunctionCategory1()
    {
        return $this->belongsTo(SubFunctionCategory::class, 'sub_function_category_id_1');
    }

    public function subFunctionCategory2()
    {
        return $this->belongsTo(SubFunctionCategory::class, 'sub_function_category_id_2');
    }

    public function getIndustries()
    {
        $industryIds = $this->industry_ids;
        return IndustryVertical::whereIn('id', $industryIds)->get();
    }

    public function calculateCompletionPercentage()
    {
        // Define the fields based on the migration schema
        $fields = [
            'full_name',
            'email',
            'mobile_number',
            'location',
            'is_founder',        // Boolean field
            'about',             // Cover letter and about the business
            'industry_ids',      // JSON field to store industry IDs as an array
            'profile_photo_path'
        ];
    
        $filled = 0;
    
        // Loop through each field and check if it's filled
        foreach ($fields as $field) {
            // Check if the field is not empty or null
            if (in_array($field, ['industry_ids', 'is_founder'])) {
                // Special handling for industry_ids (array) and is_founder (boolean)
                if ($field == 'industry_ids') {
                    // Check if industry_ids is an array and has elements
                    if (!empty($this->{$field}) && count($this->{$field}) > 0) {
                        $filled++;
                    }
                } elseif ($field == 'is_founder') {
                    // Check if is_founder is not null and not false
                    if ($this->{$field} !== null && $this->{$field} !== false) {
                        $filled++;
                    }
                }
            } else {
                // Standard field check
                if (!empty($this->{$field})) {
                    $filled++;
                }
            }
        }
    
        // Calculate completion percentage
        $percentage = ($filled / count($fields)) * 100;
    
        // Return the percentage formatted to one decimal place
        return number_format($percentage, 1);
    }
    

}
