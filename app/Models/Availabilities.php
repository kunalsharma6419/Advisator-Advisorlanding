<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Availabilities extends Model
{
    use HasFactory;

    protected $fillable = [
        'advisor_nomination_id',
        'day',
        'time_slot',
        'availability_status',
    ];
}
