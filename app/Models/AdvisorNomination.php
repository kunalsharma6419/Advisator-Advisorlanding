<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\IndustryVertical;
use App\Models\GeographyLocation;

class AdvisorNomination extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'industry_ids' => 'array',
        'geography_ids' => 'array',
        'is_terms_accept' => 'boolean',
    ];

    protected $fillable = [
        'nominee_id', 'user_id', 'full_name', 'email', 'mobile_number', 'location',
        'linkedin_profile', 'business_function_category_id', 'sub_function_category_id_1',
        'sub_function_category_id_2', 'industry_ids', 'geography_ids', 'nominee_qualification',
        'nominee_experience', 'nominee_skills', 'discovery_call_price_per_minute',
        'discovery_call_price_per_hour', 'conference_call_price_per_minute',
        'conference_call_price_per_hour', 'chat_price_per_minute', 'chat_price_per_hour','document_path',
        'nomination_reason', 'nomination_status','is_terms_accept',
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
}
