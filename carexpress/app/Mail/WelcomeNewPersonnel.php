<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WelcomeNewPersonnel extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $username;
    public $lastname;
    public $defaultpassword;
    public function __construct($username, $lastname, $defaultpassword)
    {
        //
        $this->username = $username;
        $this->lastname = $lastname;
        $this->defaultpassword = $defaultpassword;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Welcome New Personnel',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $datapersonnel = [
            'lastname' => $this->lastname,
            'username' => $this->username,
            'passwordtemporaire' => $this->defaultpassword,
        ];
        return new Content(
            view: 'emails.welcomepersonnel', with: $datapersonnel
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
