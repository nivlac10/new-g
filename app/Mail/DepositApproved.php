<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DepositApproved extends Mailable
{
    use Queueable, SerializesModels;

    public $data;  // Declare a public property to hold the data

    public function __construct($data)
    {
        $this->data = $data;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Deposit Request')
                ->markdown('emails.markdown_template', $this->data);
    }
}
