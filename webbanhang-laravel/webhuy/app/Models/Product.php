<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function images(){
        return $this ->hasMany(ProductImage::class,'product_id');

    }
    public function productImages(){
        return $this ->hasMany(ProductImage::class,'product_id');

    }
    

    
}