<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\IndustryVertical;
use App\Models\GeographyLocation;

class AdvisorProfiles extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'industry_ids' => 'array',
        'geography_ids' => 'array',
        'highlighted_images' => 'array',
        'services' => 'array',
        'awards_recognition' => 'array',
        'video_upload' => 'array',
    ];

    protected $fillable = [
        'advisor_id', 'user_id', 'full_name', 'email', 'mobile_number', 'location',
        'linkedin_profile', 'business_function_category_id', 'sub_function_category_id_1',
        'sub_function_category_id_2', 'industry_ids', 'geography_ids', 'advisor_qualification',
        'advisor_experience', 'advsior_skills', 'discovery_call_price_per_minute',
        'discovery_call_price_per_hour', 'conference_call_price_per_minute',
        'conference_call_price_per_hour', 'chat_price_per_minute', 'chat_price_per_hour', 'nomination_status',
        'highlighted_images', 'is_available', 'language_known',
        'services', 'awards_recognition', 'video_upload', 'about', 'is_founder',
        'company_name', 'company_website'
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

    public function availabilities()
    {
        return $this->hasMany(Availabilities::class);
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

    // Define the relationship
    public function evaluations()
    {
        return $this->hasMany(AdvisorEvaluation::class);
    }

    public function bankDetails()
    {
        return $this->hasOne(BankDetails::class, 'advisor_profile_id', 'advisor_id');
    }


}