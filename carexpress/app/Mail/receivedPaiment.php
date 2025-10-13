<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class receivedPaiment extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $numreceive;
    public $lastname;
    public $daterservation;
    public $montantverser;
    public function __construct($numreceive, $lastname, $daterservation, $montantverser)
    {
        $this->numreceive = $numreceive;
        $this->lastname = $lastname;
        $this->daterservation = $daterservation;
        $this->montantverser = $montantverser;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Received Paiment',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.mailreceived', with: [
                'numreceive' => $this->numreceive,
                'lastname'=> $this->lastname,
                'datereservation'=> $this->daterservation,
                'montantverser' => $this->montantverser
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
