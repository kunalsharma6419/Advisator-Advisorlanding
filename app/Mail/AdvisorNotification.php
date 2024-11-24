<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdvisorNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $advisor;
    public $authUser;

    public function __construct($advisor, $authUser)
    {
        $this->advisor = $advisor;
        $this->authUser = $authUser;
    }

    public function build()
    {
        // Include the unique ID of the authenticated user in the subject
        $subject = 'A User (ID: ' . $this->authUser->unique_id . ') is Interested in Consulting You';

        return $this->subject($subject)
                    ->view('emails.advisor_notification');
    }
}
