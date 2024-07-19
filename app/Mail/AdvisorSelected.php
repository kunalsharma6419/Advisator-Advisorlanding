<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdvisorSelected extends Mailable
{
    use Queueable, SerializesModels;
    public $advisor;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($advisor)
    {
        $this->advisor = $advisor;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.advisor_selected')
                    ->subject('Congratulations! You\'ve been selected for the role of advisor on Advisator')
                    ->with(['advisor' => $this->advisor]);
    }
}
