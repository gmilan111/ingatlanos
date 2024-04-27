<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AuctionImmediatePurchase extends Mailable
{
    use Queueable, SerializesModels;
    protected $data;
    protected $user;
    protected $url;
    protected $agent;

    /**
     * Create a new message instance.
     */
    public function __construct($data, $user, $url, $agent)
    {
        $this->data = $data;
        $this->user = $user;
        $this->url = $url;
        $this->agent = $agent;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Aukció - teljes áron vétel',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.auctions_immediate_purchase',
            with: [
                'data' => $this->data,
                'user' => $this->user,
                'url' => $this->url,
                'agent' => $this->agent,
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
