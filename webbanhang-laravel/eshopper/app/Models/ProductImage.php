<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    protected $connection = 'shared'; // Sử dụng connection shared với prefix wh_
    protected $table = "product_images"; // Tên bảng không prefix

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
