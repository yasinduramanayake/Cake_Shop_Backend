<?php

namespace App\Listeners;

use App\Events\OrderConfirmation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Cart;

class DeleteCart
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
    public function handle(OrderConfirmation $event): void
    {
        $user_id = $event->user->id;
        Cart::where('user_id', $user_id)->delete();
    }
}
