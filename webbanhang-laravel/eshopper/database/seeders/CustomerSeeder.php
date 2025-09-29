<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        $customers = [
            [
                'name' => 'Nguyễn Văn An',
                'phone' => '0901234567',
                'address' => '123 Đường Lê Lợi, Phường Bến Thành, Quận 1, TP.HCM',
                'user_id' => 1,
            ],
            [
                'name' => 'Trần Thị Bình',
                'phone' => '0987654321',
                'address' => '456 Đường Nguyễn Huệ, Phường Bến Nghé, Quận 1, TP.HCM',
                'user_id' => 2,
            ],
            [
                'name' => 'Lê Hoàng Cường',
                'phone' => '0912345678',
                'address' => '789 Đường Võ Thị Sáu, Phường Võ Thị Sáu, Quận 3, TP.HCM',
                'user_id' => 3,
            ],
            [
                'name' => 'Phạm Thị Dung',
                'phone' => '0923456789',
                'address' => '321 Đường Cách Mạng Tháng 8, Phường 10, Quận 10, TP.HCM',
                'user_id' => 4,
            ],
            [
                'name' => 'Hoàng Văn Em',
                'phone' => '0934567890',
                'address' => '654 Đường Lý Tự Trọng, Phường Bến Thành, Quận 1, TP.HCM',
                'user_id' => 5,
            ],
            [
                'name' => 'Ngô Thị Phương',
                'phone' => '0945678901',
                'address' => '987 Đường Điện Biên Phủ, Phường 21, Quận Bình Thạnh, TP.HCM',
                'user_id' => 6,
            ],
            [
                'name' => 'Vũ Minh Giang',
                'phone' => '0956789012',
                'address' => '147 Đường Phan Xích Long, Phường 2, Quận Phú Nhuận, TP.HCM',
                'user_id' => 7,
            ],
            [
                'name' => 'Đặng Thị Hương',
                'phone' => '0967890123',
                'address' => '258 Đường Trần Hưng Đạo, Phường 10, Quận 5, TP.HCM',
                'user_id' => 8,
            ],
            [
                'name' => 'Bùi Văn Inh',
                'phone' => '0978901234',
                'address' => '369 Đường Nguyễn Thái Học, Phường Cầu Ông Lãnh, Quận 1, TP.HCM',
                'user_id' => 9,
            ],
            [
                'name' => 'Đinh Thị Kim',
                'phone' => '0989012345',
                'address' => '741 Đường Lê Văn Sỹ, Phường 13, Quận 3, TP.HCM',
                'user_id' => 10,
            ],
            [
                'name' => 'Trương Văn Long',
                'phone' => '0990123456',
                'address' => '852 Đường Hoàng Văn Thụ, Phường 4, Quận Tân Bình, TP.HCM',
                'user_id' => 11,
            ],
            [
                'name' => 'Lý Thị Mai',
                'phone' => '0901357924',
                'address' => '963 Đường Xô Viết Nghệ Tĩnh, Phường 25, Quận Bình Thạnh, TP.HCM',
                'user_id' => 12,
            ],
            [
                'name' => 'Phan Văn Nam',
                'phone' => '0913579246',
                'address' => '174 Đường Nguyễn Đình Chính, Phường 11, Quận Phú Nhuận, TP.HCM',
                'user_id' => 13,
            ],
            [
                'name' => 'Võ Thị Oanh',
                'phone' => '0925791357',
                'address' => '285 Đường Cộng Hòa, Phường 13, Quận Tân Bình, TP.HCM',
                'user_id' => 14,
            ],
            [
                'name' => 'Dương Minh Phúc',
                'phone' => '0937913579',
                'address' => '396 Đường Ung Văn Khiêm, Phường 25, Quận Bình Thạnh, TP.HCM',
                'user_id' => 15,
            ],
            [
                'name' => 'Chu Thị Quỳnh',
                'phone' => '0949135792',
                'address' => '507 Đường Nguyễn Trãi, Phường 7, Quận 5, TP.HCM',
                'user_id' => 16,
            ],
            [
                'name' => 'Hồ Văn Rồng',
                'phone' => '0951379246',
                'address' => '618 Đường Âu Cơ, Phường 14, Quận Tân Bình, TP.HCM',
                'user_id' => 17,
            ],
            [
                'name' => 'Lại Thị Sương',
                'phone' => '0963791357',
                'address' => '729 Đường Lạc Long Quân, Phường 5, Quận 11, TP.HCM',
                'user_id' => 18,
            ]
        ];

        foreach ($customers as $customer) {
            Customer::create($customer);
        }
    }
}