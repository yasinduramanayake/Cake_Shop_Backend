<?php

namespace App\Listeners;

use App\Events\OrderConfirmation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
use App\Notifications\SendCArtConfirmation;
use Illuminate\Support\Facades\Notification;

class SendemailNotificationToAdmin
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
        $data = [
            'subject' => 'Order Recive Notification',
            'line1' => $event->user->name . ' has placed an order!',
            'line2' => 'Below are the Order Details : ',
            'line3' => 'Address : ' . $event->user->address,
            'line4' => 'Mobile Number : ' . $event->user->mobile,
        ];

        $adminusers = User::where('role', 'Admin')->get();
        Notification::send($adminusers, new SendCArtConfirmation($data));
    }
}
