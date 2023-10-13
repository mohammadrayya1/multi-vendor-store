<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Store extends Model
{
    use HasFactory ,Notifiable;
    protected $connection="mysql";
    protected $table="stores";
    protected $primaryKey="id";
    public $incrementing =true;


    public function products(){
        return $this->hasMany(StoreProduct::class,"store_id","id");
    }

    public function stores(){
        return $this->belongsToMany(Store::class,"storeproduct",'store_id',"product_id",'id','id')
            ->using(OrderItem::class)
            ->withPivot([
                "product_name",'price','quantity','options'
            ]);
    }


}
