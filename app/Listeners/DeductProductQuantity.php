<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Facades\Cart;
use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DeductProductQuantity
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
//    public function handle($order,$user = null)
//    {
//
//        foreach ($order->products as $product){
//                $product->decrement('quantity',$product->pivot->quantity);
//        }
//    }

    public function handle(OrderCreated $event)
    {

        foreach ($event->order->products as $product){

            $product->decrement('quantity',$product->pivot->quantity);
        }
    }
}
