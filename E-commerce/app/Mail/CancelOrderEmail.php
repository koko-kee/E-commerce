<?php

namespace App\Mail;

use App\Models\detailOrder;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class CancelOrderEmail extends Mailable
{
    use Queueable, SerializesModels;


    public function __construct(

        public User $user,
        public detailOrder $detailOrder
    )
    {}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(

            from: new Address('shopping@test.sn', 'shopping'),
            to: "kone35811@gmail.com",
            subject: 'Article annuler dans votre commande Shopping N°'.$this->detailOrder->orders_id
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.orders.cancel',
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
