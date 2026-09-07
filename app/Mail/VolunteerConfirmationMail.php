<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VolunteerConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Thank you for volunteering - Matri Seva Samiti',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.volunteer-user',
            with: [
                'name' => $this->data['name'],
                'phone' => $this->data['phone'],
                'email' => $this->data['email'],
                'address' => $this->data['address'],
            ],
        );
    }
}
