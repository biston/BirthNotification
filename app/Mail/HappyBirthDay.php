<?php

namespace App\Mail;

use App\Employe;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class HappyBirthDay extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $employe;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( Employe $employe)
    {
        $this->employe=$employe;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.birthday')->with('employe',$this->employe);
    }
}
