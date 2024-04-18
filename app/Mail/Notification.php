<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Notification extends Mailable
{
    use Queueable, SerializesModels;

    protected $properties_data;
    protected $user_data;
    protected $url;
    protected $agent;

    /**
     * Create a new message instance.
     */
    public function __construct($properties_data, $user_data, $url, $agent)
    {
        $this->properties_data = $properties_data;
        $this->user_data = $user_data;
        $this->url = $url;
        $this->agent = $agent;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Értesítés új ingatlanról',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.notification',
            with: [
                'properties_data' => $this->properties_data,
                'user_data' => $this->user_data,
                'url' => $this->url,
                'agent' => $this->agent,
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
