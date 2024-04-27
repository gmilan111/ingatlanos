<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ClosedAuctionWinner extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $price;
    protected $url;
    protected $property;
    /**
     * Create a new message instance.
     */
    public function __construct($user, $price, $url, $property)
    {
        $this->user = $user;
        $this->price = $price;
        $this->url = $url;
        $this->property = $property;
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
            markdown: 'emails.closed_auction_winner',
            with: [
                'user' => $this->user,
                'price' => $this->price,
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
