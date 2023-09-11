<?php

namespace App\Listeners;

use Illuminate\Mail\Mailer;
use App\Mail\CancelOrderEmail;
use App\Events\CancelOrderProcessed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendOrderCancel
{
    /**
     * Create the event listener.
     */
    public function __construct(private Mailer $mailer)
    {}

    /**
     * Handle the event.
     */
    public function handle(CancelOrderProcessed $event): void
    {
        $this->mailer->send(new CancelOrderEmail($event->user , $event->detailOrder));
    }
}
