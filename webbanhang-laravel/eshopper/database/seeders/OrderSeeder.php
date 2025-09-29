<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Order_Item;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run()
    {
        // Tạo các đơn hàng mẫu
        $orders = [
            [
                'customer_id' => 1,
                'user_id' => 1,
                'total_price' => 598000.00,
                'status' => 'completed'
            ],
            [
                'customer_id' => 2,
                'user_id' => 2,
                'total_price' => 22990000.00,
                'status' => 'completed'
            ],
            [
                'customer_id' => 3,
                'user_id' => 3,
                'total_price' => 1140000.00,
                'status' => 'pending'
            ],
            [
                'customer_id' => 4,
                'user_id' => 4,
                'total_price' => 65990000.00,
                'status' => 'completed'
            ],
            [
                'customer_id' => 5,
                'user_id' => 5,
                'total_price' => 830000.00,
                'status' => 'completed'
            ],
            [
                'customer_id' => 6,
                'user_id' => 6,
                'total_price' => 32990000.00,
                'status' => 'pending'
            ],
            [
                'customer_id' => 7,
                'user_id' => 7,
                'total_price' => 4290000.00,
                'status' => 'completed'
            ],
            [
                'customer_id' => 8,
                'user_id' => 8,
                'total_price' => 1750000.00,
                'status' => 'pending'
            ],
            [
                'customer_id' => 9,
                'user_id' => 9,
                'total_price' => 45980000.00,
                'status' => 'completed'
            ],
            [
                'customer_id' => 10,
                'user_id' => 10,
                'total_price' => 2990000.00,
                'status' => 'completed'
            ],
            [
                'customer_id' => 11,
                'user_id' => 11,
                'total_price' => 16480000.00,
                'status' => 'pending'
            ],
            [
                'customer_id' => 12,
                'user_id' => 12,
                'total_price' => 899000.00,
                'status' => 'completed'
            ],
            [
                'customer_id' => 13,
                'user_id' => 13,
                'total_price' => 28990000.00,
                'status' => 'completed'
            ],
            [
                'customer_id' => 14,
                'user_id' => 14,
                'total_price' => 1329000.00,
                'status' => 'pending'
            ],
            [
                'customer_id' => 15,
                'user_id' => 15,
                'total_price' => 9990000.00,
                'status' => 'completed'
            ]
        ];

        foreach ($orders as $orderData) {
            Order::create($orderData);
        }

        // Tạo chi tiết đơn hàng
        $orderItems = [
            // Đơn hàng 1 - Tổng: 598000
            ['order_id' => 1, 'product_id' => 1, 'quanty' => 1, 'price' => 299000, 'total_price' => 299000], // Áo sơ mi
            ['order_id' => 1, 'product_id' => 28, 'quanty' => 1, 'price' => 299000, 'total_price' => 299000], // Dây nhảy

            // Đơn hàng 2 - Tổng: 22990000
            ['order_id' => 2, 'product_id' => 13, 'quanty' => 1, 'price' => 22990000, 'total_price' => 22990000], // iPhone 15

            // Đơn hàng 3 - Tổng: 1140000
            ['order_id' => 3, 'product_id' => 2, 'quanty' => 2, 'price' => 149000, 'total_price' => 298000], // 2 áo thun
            ['order_id' => 3, 'product_id' => 7, 'quanty' => 1, 'price' => 380000, 'total_price' => 380000], // Váy midi
            ['order_id' => 3, 'product_id' => 6, 'quanty' => 1, 'price' => 462000, 'total_price' => 462000], // Giày sneaker (giả sử có giảm giá)

            // Đơn hàng 4 - Tổng: 65990000
            ['order_id' => 4, 'product_id' => 19, 'quanty' => 1, 'price' => 65990000, 'total_price' => 65990000], // Canon EOS R6

            // Đơn hàng 5 - Tổng: 830000
            ['order_id' => 5, 'product_id' => 5, 'quanty' => 1, 'price' => 399000, 'total_price' => 399000], // Áo khoác hoodie
            ['order_id' => 5, 'product_id' => 4, 'quanty' => 1, 'price' => 320000, 'total_price' => 320000], // Quần kaki
            ['order_id' => 5, 'product_id' => 2, 'quanty' => 1, 'price' => 111000, 'total_price' => 111000], // Áo thun (giảm giá)

            // Đơn hàng 6 - Tổng: 32990000
            ['order_id' => 6, 'product_id' => 15, 'quanty' => 1, 'price' => 32990000, 'total_price' => 32990000], // MacBook Air M3

            // Đơn hàng 7 - Tổng: 4290000
            ['order_id' => 7, 'product_id' => 21, 'quanty' => 1, 'price' => 2990000, 'total_price' => 2990000], // Nồi cơm điện
            ['order_id' => 7, 'product_id' => 11, 'quanty' => 1, 'price' => 650000, 'total_price' => 650000], // Túi xách
            ['order_id' => 7, 'product_id' => 11, 'quanty' => 1, 'price' => 650000, 'total_price' => 650000], // Túi xách thêm 1 cái

            // Đơn hàng 8 - Tổng: 1750000
            ['order_id' => 8, 'product_id' => 12, 'quanty' => 1, 'price' => 750000, 'total_price' => 750000], // Giày cao gót
            ['order_id' => 8, 'product_id' => 10, 'quanty' => 1, 'price' => 580000, 'total_price' => 580000], // Đầm công sở
            ['order_id' => 8, 'product_id' => 9, 'quanty' => 1, 'price' => 420000, 'total_price' => 420000], // Quần jeans nữ

            // Đơn hàng 9 - Tổng: 45980000
            ['order_id' => 9, 'product_id' => 14, 'quanty' => 1, 'price' => 33990000, 'total_price' => 33990000], // Samsung Galaxy S24
            ['order_id' => 9, 'product_id' => 23, 'quanty' => 1, 'price' => 11990000, 'total_price' => 11990000], // Máy lạnh LG

            // Đơn hàng 10 - Tổng: 2990000
            ['order_id' => 10, 'product_id' => 21, 'quanty' => 1, 'price' => 2990000, 'total_price' => 2990000], // Nồi cơm điện

            // Đơn hàng 11 - Tổng: 16480000
            ['order_id' => 11, 'product_id' => 17, 'quanty' => 1, 'price' => 8990000, 'total_price' => 8990000], // Sony WH-1000XM5
            ['order_id' => 11, 'product_id' => 25, 'quanty' => 1, 'price' => 2290000, 'total_price' => 2290000], // Lò vi sóng
            ['order_id' => 11, 'product_id' => 16, 'quanty' => 1, 'price' => 5200000, 'total_price' => 5200000], // Laptop Dell (giảm giá)

            // Đơn hàng 12 - Tổng: 899000
            ['order_id' => 12, 'product_id' => 6, 'quanty' => 1, 'price' => 890000, 'total_price' => 890000], // Giày sneaker
            ['order_id' => 12, 'product_id' => 28, 'quanty' => 1, 'price' => 9000, 'total_price' => 9000], // Dây nhảy (giảm giá khuyến mãi)

            // Đơn hàng 13 - Tổng: 28990000
            ['order_id' => 13, 'product_id' => 16, 'quanty' => 1, 'price' => 14990000, 'total_price' => 14990000], // Dell Inspiron 15
            ['order_id' => 13, 'product_id' => 20, 'quanty' => 1, 'price' => 13990000, 'total_price' => 13990000], // Smart TV Samsung
            ['order_id' => 13, 'product_id' => 28, 'quanty' => 1, 'price' => 10000, 'total_price' => 10000], // Dây nhảy

            // Đơn hàng 14 - Tổng: 1329000
            ['order_id' => 14, 'product_id' => 8, 'quanty' => 1, 'price' => 450000, 'total_price' => 450000], // Áo blouse
            ['order_id' => 14, 'product_id' => 3, 'quanty' => 1, 'price' => 450000, 'total_price' => 450000], // Quần jeans nam
            ['order_id' => 14, 'product_id' => 1, 'quanty' => 1, 'price' => 299000, 'total_price' => 299000], // Áo sơ mi
            ['order_id' => 14, 'product_id' => 2, 'quanty' => 1, 'price' => 130000, 'total_price' => 130000], // Áo thun (giảm giá)

            // Đơn hàng 15 - Tổng: 9990000
            ['order_id' => 15, 'product_id' => 20, 'quanty' => 1, 'price' => 9990000, 'total_price' => 9990000], // Apple Watch Series 9
        ];

        foreach ($orderItems as $item) {
            Order_Item::create($item);
        }
    }
}