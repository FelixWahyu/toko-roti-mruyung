<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contactData;
    public $settings;

    /**
     * Create a new message instance.
     */
    public function __construct(array $data, $settings)
    {
        $this->contactData = $data;
        $this->settings = $settings;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address($this->contactData['email'], $this->contactData['name']),
            replyTo: [
                new Address($this->contactData['email'], $this->contactData['name']),
            ],
            subject: 'Pesan Baru dari Formulir Kontak: ' . $this->contactData['subject'],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact.form',
            with: [
                'storeName' => $this->settings['store_name']->value ?? 'Toko Roti Mruyung',
                'logoPath' => $this->settings['store_logo']->value ?? null,
            ],
        );
    }
}
