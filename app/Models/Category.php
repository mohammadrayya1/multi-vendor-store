<?php

namespace App\Models;

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
}
