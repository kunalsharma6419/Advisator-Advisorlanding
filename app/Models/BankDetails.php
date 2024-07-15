<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\BankDetails;

class BankDetails extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'advisor_profile_id',
        'bank_name',
        'account_holder_name',
        'account_number',
        'account_type',
        'bank_ifsc'
    ];

    public function advisorProfile()
    {
        return $this->belongsTo(AdvisorProfiles::class, 'advisor_profile_id', 'advisor_id');
    }


}
