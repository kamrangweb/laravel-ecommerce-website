<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailGonder extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $data;
    
    public function __construct($data)
    {
        //
        $this->data = $data;
        
    }
     
    public function build()
    {
        //
        return $this->subject('Teklif formu - '.$this->data->konu)->view('frontend.mesaj.mail_sablon');

    }

}
