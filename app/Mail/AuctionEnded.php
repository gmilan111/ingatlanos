<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AuctionEnded extends Mailable
{
    use Queueable, SerializesModels;

    protected $url;
    protected $property;
    protected $agent;

    /**
     * Create a new message instance.
     */
    public function __construct($url, $property, $agent)
    {
        $this->url = $url;
        $this->property = $property;
        $this->agent = $agent;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Aukció lezárult',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.auction_ended',
            with: [
                'agent' => $this->agent,
                'url' => $this->url,
                'property' => $this->property,
            ],
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
