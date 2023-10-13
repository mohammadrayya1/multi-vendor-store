<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoreProduct extends Pivot
{


    public $incrementing=true;
    public $timestamps = false;

    use HasFactory,SoftDeletes;
    protected $connection="mysql";
    protected $table="storeproduct";
   // protected $primaryKey=['id',"product_id","store_id"];




    public  function products(){
        return $this->belongsTo(Product::class,"products_id",'id');
    }


    public  function soters(){
        return $this->belongsTo(Store::class,"store_id",'id');
    }
}
