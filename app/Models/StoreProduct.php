<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoreProduct extends Model
{
    use HasFactory,SoftDeletes;
    protected $connection="mysql";
    protected $table="storeproduct";
   // protected $primaryKey=['id',"product_id","store_id"];
    public $incrementing =true;



    public  function products(){
        return $this->belongsTo(Product::class,"products_id",'id');
    }


    public  function soters(){
        return $this->belongsTo(Store::class,"store_id",'id');
    }
}
