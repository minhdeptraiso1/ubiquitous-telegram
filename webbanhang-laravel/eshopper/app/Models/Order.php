<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;

class Order extends Model
{
    use HasFactory;
    protected $connection = 'shared'; // Sử dụng connection shared với prefix wh_
    protected $table = "orders"; // Tên bảng không prefix

    protected $fillable = ['user_id', 'customer_id', 'status', 'total_price','payment_status', 'payment_method'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function orderItems() // Tên chuẩn
    {
        return $this->hasMany(Order_Item::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
