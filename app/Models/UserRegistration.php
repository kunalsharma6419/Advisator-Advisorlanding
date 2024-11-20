<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\IndustryVertical;
use App\Models\GeographyLocation;

class UserRegistration extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'industry_ids' => 'array',
        'geography_ids' => 'array',
        'is_terms_accept' => 'boolean', // Cast the 'is_terms_accept' field to a boolean value
    ];

    protected $fillable = [
        'user_id', 
        'full_name', 
        'email', 
        'mobile_number', 
        'location', 
        'business_function_category_id', 
        'sub_function_category_id_1',
        'sub_function_category_id_2', 
        'industry_ids', 
        'geography_ids',
        'is_terms_accept', // Add 'is_terms_accept' to the fillable attributes
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

    public function getGeographies()
    {
        $geographyIds = $this->geography_ids;
        return GeographyLocation::whereIn('id', $geographyIds)->get();
    }
}
