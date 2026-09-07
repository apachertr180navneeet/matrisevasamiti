<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
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
            subject: 'Contact Form: ' . ($this->data['subject'] ?? 'New Message'),
            replyTo: [
                new Address($this->data['email'], $this->data['name'] ?? 'Contact Form Submitter'),
            ],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact',
            with: [
                'name' => $this->data['name'],
                'email' => $this->data['email'],
                'phone' => $this->data['phone'] ?? 'N/A',
                'subject' => $this->data['subject'],
                'userMessage' => $this->data['message'],
            ],
        );
    }
}
