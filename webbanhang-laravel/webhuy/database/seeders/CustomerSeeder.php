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
                'address' => '123 Đường Lê Lợi, Quận 1, TP.HCM',
            ],
            [
                'name' => 'Trần Thị Bình',
                'phone' => '0987654321',
                'address' => '456 Đường Nguyễn Huệ, Quận 1, TP.HCM',
            ],
            [
                'name' => 'Lê Hoàng Cường',
                'phone' => '0912345678',
                'address' => '789 Đường Võ Thị Sáu, Quận 3, TP.HCM',
            ],
            [
                'name' => 'Phạm Thị Dung',
                'phone' => '0923456789',
                'address' => '321 Đường Cách Mạng Tháng 8, Quận 10, TP.HCM',
            ],
            [
                'name' => 'Hoàng Văn Em',
                'phone' => '0934567890',
                'address' => '654 Đường Lý Tự Trọng, Quận 1, TP.HCM',
            ],
            [
                'name' => 'Ngô Thị Phương',
                'phone' => '0945678901',
                'address' => '987 Đường Điện Biên Phủ, Quận Bình Thạnh, TP.HCM',
            ],
            [
                'name' => 'Vũ Minh Giang',
                'phone' => '0956789012',
                'address' => '147 Đường Phan Xích Long, Quận Phú Nhuận, TP.HCM',
            ],
            [
                'name' => 'Đặng Thị Hương',
                'phone' => '0967890123',
                'address' => '258 Đường Trần Hưng Đạo, Quận 5, TP.HCM',
            ],
            [
                'name' => 'Bùi Văn Inh',
                'phone' => '0978901234',
                'address' => '369 Đường Nguyễn Thái Học, Quận 1, TP.HCM',
            ],
            [
                'name' => 'Đinh Thị Kim',
                'phone' => '0989012345',
                'address' => '741 Đường Lê Văn Sỹ, Quận 3, TP.HCM',
            ],
            [
                'name' => 'Trương Văn Long',
                'phone' => '0990123456',
                'address' => '852 Đường Hoàng Văn Thụ, Quận Tân Bình, TP.HCM',
            ],
            [
                'name' => 'Lý Thị Mai',
                'phone' => '0901357924',
                'address' => '963 Đường Xô Viết Nghệ Tĩnh, Quận Bình Thạnh, TP.HCM',
            ],
            [
                'name' => 'Phan Văn Nam',
                'phone' => '0913579246',
                'address' => '174 Đường Nguyễn Đình Chính, Quận Phú Nhuận, TP.HCM',
            ],
            [
                'name' => 'Võ Thị Oanh',
                'phone' => '0925791357',
                'address' => '285 Đường Cộng Hòa, Quận Tân Bình, TP.HCM',
            ],
            [
                'name' => 'Dương Minh Phúc',
                'phone' => '0937913579',
                'address' => '396 Đường Ung Văn Khiêm, Quận Bình Thạnh, TP.HCM',
            ]
        ];

        foreach ($customers as $customer) {
            Customer::create($customer);
        }
    }
}