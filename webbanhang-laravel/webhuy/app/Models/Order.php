<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'status',
        'total_price',
        'customer_id', // Thêm khóa ngoại của khách hàng
        'user_id', // Thêm user_id
        'payment_status', // Thêm trạng thái thanh toán
        'payment_method', // Thêm phương thức thanh toán
    ];

    public static function getStatuses()
    {
        return [
            'Chờ xử lý' => 'Chờ xử lý',
            'Đã xác nhận' => 'Đã xác nhận',
            'Đã gửi hàng' => 'Đã gửi hàng',
            'Đã giao hàng' => 'Đã giao hàng',
            'Đã nhận' => 'Đã nhận',
        ];
    }

    // Mối quan hệ với khách hàng
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Mối quan hệ với user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Mối quan hệ với các mặt hàng trong đơn hàng
    public function orderitems() // Đặt tên quan hệ là 'orderitems'
    {
        return $this->hasMany(Order__Item::class);
    }


}
