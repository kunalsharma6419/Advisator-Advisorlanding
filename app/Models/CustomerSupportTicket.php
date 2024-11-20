<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerSupportTicket extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id','advisor_profile_id', 'subject', 'description', 'attachment'
    ];
}
