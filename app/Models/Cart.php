<?php

namespace App\Models;

use App\Observers\CartObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Cart extends Model
{
    use HasFactory;



    public static function booted(){
//            static::creating(function (Cart $cart){
//                $cart->id=Str::uuid();
//            });

//        OR
        static::creating( CartObserver::class);


    }


    public function user(){
        return $this->belongsTo(User::class)->withDefault(["name"=>"Anonymous"]);
    }

    public function products(){
        return $this->belongsTo(Product::class);
    }
}
