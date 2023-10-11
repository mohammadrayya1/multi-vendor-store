<?php

namespace App\Http\Controllers\Front;

use App\Facades\Cart;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Throwable;

class CheckoutController extends Controller
{

    public function create(Cart $cart)
    {
        if ($cart::get()->count()==0){
            return Redirect::route('home');
        }
        return view('front.checkout', ['cart' => $cart]);
    }

    public function store(Request $request, Cart $cart)
    {



        $request->validate([]);
        $items =$cart::get()->all();

        DB::beginTransaction();
        try {

            $order = Order::create([
                'store_id' => 3,
                'user_id' => Auth::id(),
                'payment_method' => "cod"
            ]);

            foreach ($cart::get() as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product->id,
                    'product_name' => $item->product->product_name,
                    'price' => $item->product->price,
                    'quantity' => $item->quantity
                ]);
            }
            foreach ($request->post('addr') as $type => $address) {
                $address['type'] = $type;
                $order->addresses()->create($address);
            }

            DB::commit();
        } catch (Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }

}
