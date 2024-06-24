<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdvisorNomination extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'industry_ids' => 'array',
        'geography_ids' => 'array',
    ];

    protected $fillable = [
        'nominee_id', 'user_id', 'full_name', 'email', 'mobile_number', 'location',
        'linkedin_profile', 'business_function_category_id', 'sub_function_category_id_1',
        'sub_function_category_id_2', 'industry_ids', 'geography_ids', 'nominee_qualification',
        'nominee_experience', 'nominee_skills', 'discovery_call_price_per_minute',
        'discovery_call_price_per_hour', 'conference_call_price_per_minute',
        'conference_call_price_per_hour', 'chat_price_per_minute', 'chat_price_per_hour',
        'nomination_reason', 'nomination_status'
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
}
