<?php

namespace App\Listeners;

use App\Mail\OrderCarryOut;
use App\Events\confirmOrderProcessed;
use App\Models\Orders;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailer;

class SendOrderConfirProcessed
{
    /**
     * Create the event listener.
     */
    public function __construct(private Mailer $mailer)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(confirmOrderProcessed $event): void
    {
        sleep(60);
        $this->mailer->send(new OrderCarryOut($event->user , $event->orders));
        $order = Orders::find($event->orders->id);
        $order->order_statut = "en attente de confirmation";
        $order->save();
    }
} 
