<?php

namespace App\Repositories\Cart;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class CartModelRepository implements CartRepository
{


    public function get():Collection
    {
        return Cart::with('product')->where("cookie_id",'=',$this->getCookie_id())->get();
    }

    public function add( Product $product,$quantity =1  ){

        $item = Cart::where('product_id',"=",$product->id)
               ->where('cookie_id','=',$this->getCookie_id())
               ->first();

        if (!$item){
            return Cart::create([
                'cookie_id'=>$this->getCookie_id(),
                "user_id"=>Auth::user(),
                'product_id'=>$product->id,
                'quantity'=>$quantity

            ]);
        }
        return $item->increment('quantity',$quantity);

    }
    public function update( Product $product,$quantity){
        Cart::where('product_id',"=",$product->id)
            ->where('cookie_id','=',$this->getCookie_id())
            ->update(['quantity'=>$quantity]);
    }
    public function delete($id){
        Cart::where('product_id',"=",$id)
            ->where('cookie_id','=',$this->getCookie_id())
            ->delete();
    }
    public function empty(){
        Cart::where('cookie_id',$this->getCookie_id())->delete();
    }
    public function total():float{
        return Cart::where('cookie_id','=',$this->getCookie_id())
            ->join("products",'products.id','=','carts.product_id')
            ->selectRaw('sum(products.price * carts.quantity) as total')
            ->value('total');//return just value not column
    }


    public function getCookie_id(){
        $cookie_id=Cookie::get("cart_id");
        if (!$cookie_id){
            $cookie_id=Str::uuid();
            Cookie::queue("cart_id", $cookie_id,30*24*60);
        }
        return $cookie_id;
    }

}