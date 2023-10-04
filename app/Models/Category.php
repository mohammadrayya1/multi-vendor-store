<?php

namespace App\Models;

use App\Rules\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory ,SoftDeletes;
    protected $fillable=[
        'name','slug','status','category_id','description','imag'
    ];
    protected $connection="mysql";
    protected $table="categories";
    protected $primaryKey="id";
    public $incrementing =true;


        public  function products(){
            return $this->hasMany(Product::class,"category_id",'id');
        }

    public static function scopeFilters(Builder $builder,$filters){

        $builder->when($filters['name']?? false,function ($builder,$value){
            $builder->where('categories.name','LIKE',"%{$value}%");
        });

        $builder->when($filters['status'] ?? false,function ($builder,$value){
            $builder->where('categories.status','=',$value);
                    });


//        if ($filters['name']?? false){
//          $builder->where('name','LIKE',"%{$filters['name']}%");
//        }
//        if ($filters['status']?? false){
//            $builder->where('status','=',$filters['status']);
//        }
}

    public static function rules($id=0){

        return [
                "name"=>['required','min:5',"unique:categories,name,$id",'filter:laravel'

                           // new Filter(['laravel','php'])

                    ],
                "status"=>"required",
                "category_id"=>['int','exists:categories,id',"nullable"],
                "imag"=>[]
            ,['name.required' => 'Please enter name or whatever you want',
            'status.required' => 'fill the atatus inactive or active',
                'category_id.int' => 'fill the category must be unique...']
        ];
    }


    public function parent(){
            return $this->belongsTo(Category::Class,"category_id")->withDefault(['name'=>'--']);
    }

    public function childern(){
            return $this->hasMany(Category::class,"category_id","id");
    }
}
