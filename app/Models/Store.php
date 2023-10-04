<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $connection="mysql";
    protected $table="stores";
    protected $primaryKey="id";
    public $incrementing =true;


    public function products(){
        return $this->hasMany(StoreProduct::class,"store_id","id");
    }

}
