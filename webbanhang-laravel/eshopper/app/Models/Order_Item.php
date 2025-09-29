<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Item extends Model
{
    use HasFactory;
    protected $connection = 'shared'; // Sử dụng connection shared với prefix wh_
    protected $table = "order__items"; // Tên bảng không prefix

    protected $fillable = [ 'order_id', 'product_id', 'quanty', 'price', 'total_price'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
