<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\AdvisorNomination;

class AdvisorRejected extends Mailable
{
    use Queueable, SerializesModels;

    public $nomination;

    /**
     * Create a new message instance.
     *
     * @param AdvisorNomination $nomination
     * @return void
     */
    public function __construct(AdvisorNomination $nomination)
    {
        $this->nomination = $nomination;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Nomination Rejected')
                    ->view('emails.advisor_rejected');
    }
}
