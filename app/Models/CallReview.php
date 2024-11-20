<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CallReview extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'call_reviews';

    protected $fillable = [
        'user_id',
        'advisor_id',
        'overall_experience',
        'reliability',
        'affordability',
        'relevance_to_problem',
        'review',
    ];

    /**
     * Relationship with the User model.
     * This assumes 'user_id' in call_reviews refers to 'id' in users.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    public function userProfile()
{
    return $this->hasOne(UserProfiles::class, 'user_id', 'user_id');
}


    /**
     * Relationship with the AdvisorProfile model.
     * This assumes 'advisor_id' in call_reviews refers to 'advisor_id' in advisor_profiles.
     */
    public function advisor()
    {
        return $this->belongsTo(AdvisorProfiles::class, 'advisor_id', 'advisor_id');
    }
}
