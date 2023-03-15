<?php

namespace App\Listeners;

use App\Events\AddProductToOrder;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class InformOwnerNewOrder
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(AddProductToOrder $event): void
    {
       $user=$event->product->user;
       if ($user!=null){
           Mail::send('email.uzsakymas', [
               'product'=>$event->product,
               'order'=>$event->order,
           ], function($message) use ($user) {
               $message->to($user->email)->subject("Patalpintas naujas užsakymas")->from("bit@poligonas.lt");
           });

       }
    }
}
