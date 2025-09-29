<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $connection = 'shared'; // Sử dụng connection shared với prefix wh_
    protected $table = "products"; // Tên bảng không prefix, connection sẽ thêm wh_

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }
}

