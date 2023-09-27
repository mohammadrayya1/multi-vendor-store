<?php

namespace App\Models;

use App\Rules\Filter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=[
        'name','slug','status','category_id','description','imag'
    ];
    protected $connection="mysql";
    protected $table="categories";
    protected $primaryKey="id";
    public $incrementing =true;

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
}
