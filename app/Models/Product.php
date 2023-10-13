<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    protected $connection="mysql";
    protected $table="products";
    protected $primaryKey="id";
    public $incrementing =true;

    protected $fillable=[
        'product_name','slug','status','category_id','description','stock',
        "product_image",'price','compare_price','options','rating','feature'
    ];

    public  function category(){
        return $this->belongsTo(Category::class,"category_id",'id');
    }

    public function stores(){
        return $this->hasMany(StoreProduct::class,"product_id","id");
    }

    public static function getstorename ($id)
    {
      return  $name = DB::table('stores')->where('id','=',$id)
            ->select('name')
            ->get();

      //  return $name=Store::findOrFail($id);
    }

    public static  function scopeActive(Builder $builder)
    {
        $builder->where('status', '=', 'active');
    }

//    public static function booted()
//    {
//      static::addGlobalScope('store',function (Builder $builder){
//          $user =Auth::user();
//            if ($user->store_id){
//                $builder->where('store_id',"=",$user->store_id);
//            }
//      });
//    }

public function tags(){
        return $this->belongsToMany(Tag::class,//Related Modle
            'product_tag', //Pivot Table name
            'product_id',//fk table for the curent model
            'tag_id',//fk table for the related table
            'id', //pk current model
            "id"//pk related table
        );
}


//Accessore it should between get and Attribute

            public function getImageUrlAttribute(){

                    if(!$this->product_image){

                        return "https://hedgescompany.com/wp-content/uploads/2018/09/image_coming_soon600x400.png";
                    }
                return asset('uploads/'.$this->product_image);
            }


    public function getSalePercentAttribute(){

        if(!$this->compare_price){

            return 0;
        }
        return number_format(100-(100 * $this->price/$this->compare_price),2);
    }



    public function products(){
        return $this->belongsToMany(Product::class,"order_items",'order_id',"product_id",'id','id')
            ->using(OrderItem::class)
            ->withPivot([
                "product_name",'price','quantity','options'
            ]);
    }


    public function productsStore(){
        return $this->belongsToMany(Product::class,"storeproduct",'store_id',"product_id",'id','id')
            ->using(StoreProduct::class)
            ->withPivot([
                'name',"product_name",'price','quantity','options'
            ]);
    }
}
