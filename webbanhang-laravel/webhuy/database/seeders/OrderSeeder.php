<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Order__item;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run()
    {
        // Tạo đơn hàng mẫu
        $orders = [
            [
                'customer_id' => 1,
                'status' => 'Đã xác nhận',
                'total_price' => 899000.00,
            ],
            [
                'customer_id' => 2,
                'status' => 'Đang giao hàng',
                'total_price' => 1299000.00,
            ],
            [
                'customer_id' => 3,
                'status' => 'Đã giao',
                'total_price' => 450000.00,
            ],
            [
                'customer_id' => 4,
                'status' => 'Chờ xử lý',
                'total_price' => 6590000.00,
            ],
            [
                'customer_id' => 5,
                'status' => 'Đã giao',
                'total_price' => 380000.00,
            ],
            [
                'customer_id' => 6,
                'status' => 'Đã xác nhận',
                'total_price' => 15990000.00,
            ],
            [
                'customer_id' => 7,
                'status' => 'Đang giao hàng',
                'total_price' => 3290000.00,
            ],
            [
                'customer_id' => 8,
                'status' => 'Chờ xử lý',
                'total_price' => 680000.00,
            ],
            [
                'customer_id' => 9,
                'status' => 'Đã giao',
                'total_price' => 29990000.00,
            ],
            [
                'customer_id' => 10,
                'status' => 'Đã xác nhận',
                'total_price' => 890000.00,
            ]
        ];

        foreach ($orders as $orderData) {
            Order::create($orderData);
        }

        // Tạo chi tiết đơn hàng
        $orderItems = [
            // Đơn hàng 1 - Tổng: 899000
            ['order_id' => 1, 'product_id' => 1, 'quanty' => 1, 'price' => 299000, 'total_price' => 299000], // Áo sơ mi
            ['order_id' => 1, 'product_id' => 19, 'quanty' => 1, 'price' => 600000, 'total_price' => 600000], // Túi gym (giả sử giá khác)
            
            // Đơn hàng 2 - Tổng: 1299000
            ['order_id' => 2, 'product_id' => 2, 'quanty' => 2, 'price' => 149000, 'total_price' => 298000], // 2 áo thun
            ['order_id' => 2, 'product_id' => 14, 'quanty' => 1, 'price' => 1001000, 'total_price' => 1001000], // Nồi cơm (giá điều chỉnh)
            
            // Đơn hàng 3 - Tổng: 450000
            ['order_id' => 3, 'product_id' => 3, 'quanty' => 1, 'price' => 450000, 'total_price' => 450000], // Quần jeans
            
            // Đơn hàng 4 - Tổng: 6590000
            ['order_id' => 4, 'product_id' => 11, 'quanty' => 1, 'price' => 6290000, 'total_price' => 6290000], // AirPods Pro
            ['order_id' => 4, 'product_id' => 1, 'quanty' => 1, 'price' => 300000, 'total_price' => 300000], // Áo sơ mi (giá làm tròn)
            
            // Đơn hàng 5 - Tổng: 380000
            ['order_id' => 5, 'product_id' => 5, 'quanty' => 1, 'price' => 380000, 'total_price' => 380000], // Váy maxi
            
            // Đơn hàng 6 - Tổng: 15990000
            ['order_id' => 6, 'product_id' => 17, 'quanty' => 1, 'price' => 15990000, 'total_price' => 15990000], // Laptop Dell
            
            // Đơn hàng 7 - Tổng: 3290000
            ['order_id' => 7, 'product_id' => 18, 'quanty' => 1, 'price' => 3290000, 'total_price' => 3290000], // Giày Nike
            
            // Đơn hàng 8 - Tổng: 680000
            ['order_id' => 8, 'product_id' => 7, 'quanty' => 1, 'price' => 680000, 'total_price' => 680000], // Đầm dự tiệc
            
            // Đơn hàng 9 - Tổng: 29990000
            ['order_id' => 9, 'product_id' => 9, 'quanty' => 1, 'price' => 29990000, 'total_price' => 29990000], // iPhone 15 Pro Max
            
            // Đơn hàng 10 - Tổng: 890000
            ['order_id' => 10, 'product_id' => 8, 'quanty' => 1, 'price' => 890000, 'total_price' => 890000], // Túi xách da
        ];

        foreach ($orderItems as $item) {
            Order__item::create($item);
        }
    }
}