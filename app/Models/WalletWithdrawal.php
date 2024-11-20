<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AdvisorProfiles;

class WalletWithdrawal extends Model
{
    use HasFactory;

    protected $fillable = ['advisor_profile_id', 'withdraw_amount', 'bank_account_number', 'bank_ifsc', 'status'];

    public function advisorProfile()
    {
        return $this->belongsTo(AdvisorProfiles::class, 'advisor_profile_id', 'advisor_id');
    }
}
