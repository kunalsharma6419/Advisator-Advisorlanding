<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id', 'sender_id', 'receiver_id', 'call_type', 'initiated_at', 'joined_at', 'status', 'raw_response',
    ];

    protected $casts = [
        'raw_response' => 'array',  // Cast raw_response as JSON
    ];
}
