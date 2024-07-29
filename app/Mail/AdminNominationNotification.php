<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\AdvisorNomination;

class AdminNominationNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $advisor;

    public function __construct(AdvisorNomination $advisor)
    {
        $this->advisor = $advisor;
    }

    public function build()
    {
        return $this->markdown('emails.admin.nomination')
                    ->subject('New Nomination Received')
                    ->with('advisor', $this->advisor);
    }
}
