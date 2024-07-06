<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\AdvisorNomination;

class AdvisorEvaluation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'advisor_nomination_id', 'experience_score', 'expertise_score', 'linkedin_score',
        'availability_score', 'industry_recognition_score', 'recommendations_score',
        'content_leadership_score', 'connections_score', 'overall_score'
    ];

    public function advisorNomination()
    {
        return $this->belongsTo(AdvisorNomination::class);
    }

    public static function calculateOverallScore($evaluation)
    {
        // Calculate the weighted overall score
        $overall_score = (
            $evaluation->experience_score * 0.15 +
            $evaluation->expertise_score * 0.20 +
            $evaluation->linkedin_score * 0.10 +
            $evaluation->availability_score * 0.15 +
            $evaluation->industry_recognition_score * 0.15 +
            $evaluation->recommendations_score * 0.15 +
            $evaluation->content_leadership_score * 0.05 +
            $evaluation->connections_score * 0.05
        );

        // Update the overall score
        $evaluation->overall_score = $overall_score;
        $evaluation->save();
    }
}
