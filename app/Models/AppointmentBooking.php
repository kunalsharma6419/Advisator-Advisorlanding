<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AppointmentBooking extends Model
{
    use HasFactory, SoftDeletes;
    // In your Booking model
    protected $dates = ['booking_date'];

    protected $fillable = ['booking_id', 'advisor_id', 'user_id','booking_date', 'booking_link','day', 'time_slot', 'status', 'is_booked','booking_status', 'booking_amount'];

    public function advisorNomination()
    {
        return $this->belongsTo(AdvisorNomination::class, 'advisor_id', 'nominee_id');
    }
    

    // In AppointmentBooking model
public function userProfile()
{
    return $this->belongsTo(UserProfiles::class, 'user_id', 'user_id');
}


}
