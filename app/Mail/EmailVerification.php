<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class EmailVerification extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->user=12345;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
    return $this->from('noreply@AIcrowd.ir', 'AIcrowd')
                ->view('emails.email-verification');
    }
}
