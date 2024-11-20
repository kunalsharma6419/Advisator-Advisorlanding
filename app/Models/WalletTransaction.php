<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WalletTransaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'date',
        'time',
        'status',
        'method',
        'amount',
        'total_wallet_balance',
    ];

    // Optional: If you want to specify custom date format casts
    protected $casts = [
        'date' => 'date',
        'time' => 'datetime:H:i:s',
    ];

    // Define the relationship to the User model (if needed)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'unique_id');
    }
}
