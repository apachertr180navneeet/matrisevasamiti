<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;

class VolunteerRegistrationMail extends Mailable
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
            subject: 'New Volunteer Registration - Matri Seva Samiti',
            replyTo: [
                new Address($this->data['email'], $this->data['name'] ?? 'Volunteer Applicant'),
            ],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.volunteer-admin',
            with: [
                'name' => $this->data['name'],
                'phone' => $this->data['phone'],
                'email' => $this->data['email'],
                'address' => $this->data['address'],
                'userMessage' => $this->data['message'] ?? '',
                'date' => now()->format('Y-m-d H:i:s'),
            ],
        );
    }
}
