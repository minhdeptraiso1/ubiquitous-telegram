<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            // Thời trang nam
            [
                'name' => 'Áo Sơ Mi Trắng Classic',
                'price' => '299000',
                'feature_image_path' => 'products/ao-so-mi-trang-classic.jpg',
                'content' => '<p>Áo sơ mi trắng basic, chất liệu cotton cao cấp, phù hợp mọi dịp. Form áo vừa vặn, thoải mái khi mặc.</p>',
                'user_id' => 1,
                'category_id' => 7, // Áo Sơ Mi Nam
                'quanty' => '50',
            ],
            [
                'name' => 'Áo Thun Nam Basic',
                'price' => '149000',
                'feature_image_path' => 'products/ao-thun-nam-basic.jpg',
                'content' => '<p>Áo thun nam basic, chất liệu cotton 100%, co giãn tốt. Phù hợp cho hoạt động hàng ngày.</p>',
                'user_id' => 1,
                'category_id' => 8, // Áo Thun Nam
                'quanty' => '100',
            ],
            [
                'name' => 'Quần Jeans Nam Slim Fit',
                'price' => '450000',
                'feature_image_path' => 'products/quan-jeans-nam-slim.jpg',
                'content' => '<p>Quần jeans nam dáng slim fit, chất liệu denim cao cấp, bền đẹp theo thời gian.</p>',
                'user_id' => 1,
                'category_id' => 9, // Quần Jeans Nam
                'quanty' => '75',
            ],
            [
                'name' => 'Áo Khoác Bomber Nam',
                'price' => '599000',
                'feature_image_path' => 'products/ao-khoac-bomber-nam.jpg',
                'content' => '<p>Áo khoác bomber năng động, phong cách trẻ trung. Chất liệu polyester chống gió nhẹ.</p>',
                'user_id' => 1,
                'category_id' => 11, // Áo Khoác Nam
                'quanty' => '30',
            ],

            // Thời trang nữ
            [
                'name' => 'Váy Maxi Hoa Nhí',
                'price' => '380000',
                'feature_image_path' => 'products/vay-maxi-hoa-nhi.jpg',
                'content' => '<p>Váy maxi họa tiết hoa nhí, chất liệu voan mềm mại. Phù hợp dạo phố, đi du lịch.</p>',
                'user_id' => 1,
                'category_id' => 13, // Váy Nữ
                'quanty' => '40',
            ],
            [
                'name' => 'Áo Blouse Trắng Công Sở',
                'price' => '250000',
                'feature_image_path' => 'products/ao-blouse-trang-cong-so.jpg',
                'content' => '<p>Áo blouse trắng thanh lịch, thiết kế công sở chuyên nghiệp. Chất liệu polyester cao cấp.</p>',
                'user_id' => 1,
                'category_id' => 14, // Áo Blouse
                'quanty' => '60',
            ],
            [
                'name' => 'Đầm Dự Tiệc Đen',
                'price' => '680000',
                'feature_image_path' => 'products/dam-du-tiec-den.jpg',
                'content' => '<p>Đầm dự tiệc màu đen sang trọng, thiết kế ôm body tôn dáng. Phù hợp các buổi tiệc tối.</p>',
                'user_id' => 1,
                'category_id' => 16, // Đầm Nữ
                'quanty' => '25',
            ],
            [
                'name' => 'Túi Xách Da Thật',
                'price' => '890000',
                'feature_image_path' => 'products/tui-xach-da-that.jpg',
                'content' => '<p>Túi xách da thật cao cấp, thiết kế thanh lịch. Kích thước vừa phải, nhiều ngăn tiện dụng.</p>',
                'user_id' => 1,
                'category_id' => 17, // Túi Xách
                'quanty' => '20',
            ],

            // Điện tử
            [
                'name' => 'iPhone 15 Pro Max',
                'price' => '29990000',
                'feature_image_path' => 'products/iphone-15-pro-max.jpg',
                'content' => '<p>iPhone 15 Pro Max với chip A17 Pro mạnh mẽ, camera 48MP chụp ảnh siêu nét. Bảo hành chính hãng 12 tháng.</p>',
                'user_id' => 1,
                'category_id' => 19, // Điện Thoại
                'quanty' => '15',
            ],
            [
                'name' => 'MacBook Air M2',
                'price' => '28990000',
                'feature_image_path' => 'products/macbook-air-m2.jpg',
                'content' => '<p>MacBook Air M2 với thiết kế mỏng nhẹ, hiệu năng vượt trội. RAM 8GB, SSD 256GB.</p>',
                'user_id' => 1,
                'category_id' => 20, // Laptop
                'quanty' => '10',
            ],
            [
                'name' => 'AirPods Pro 2',
                'price' => '6290000',
                'feature_image_path' => 'products/airpods-pro-2.jpg',
                'content' => '<p>AirPods Pro thế hệ 2 với chống ồn chủ động cải tiến, âm thanh spatial audio sống động.</p>',
                'user_id' => 1,
                'category_id' => 21, // Tai Nghe
                'quanty' => '35',
            ],
            [
                'name' => 'Canon EOS R5',
                'price' => '89990000',
                'feature_image_path' => 'products/canon-eos-r5.jpg',
                'content' => '<p>Máy ảnh Canon EOS R5 mirrorless full-frame, 45MP, quay video 8K. Dành cho nhiếp ảnh gia chuyên nghiệp.</p>',
                'user_id' => 1,
                'category_id' => 22, // Máy Ảnh
                'quanty' => '5',
            ],
            [
                'name' => 'Apple Watch Series 9',
                'price' => '9990000',
                'feature_image_path' => 'products/apple-watch-series-9.jpg',
                'content' => '<p>Apple Watch Series 9 với chip S9 mới, màn hình Retina luôn bật, theo dõi sức khỏe toàn diện.</p>',
                'user_id' => 1,
                'category_id' => 23, // Smartwatch
                'quanty' => '25',
            ],

            // Gia dụng
            [
                'name' => 'Nồi Cơm Điện Tử Sharp',
                'price' => '2990000',
                'feature_image_path' => 'products/noi-com-dien-tu-sharp.jpg',
                'content' => '<p>Nồi cơm điện tử Sharp 1.8L, công nghệ fuzzy logic, nấu cơm ngon đều tăm. Bảo hành 12 tháng.</p>',
                'user_id' => 1,
                'category_id' => 24, // Nồi Cơm Điện
                'quanty' => '40',
            ],
            [
                'name' => 'Máy Lạnh Daikin 1HP',
                'price' => '12990000',
                'feature_image_path' => 'products/may-lanh-daikin-1hp.jpg',
                'content' => '<p>Máy lạnh Daikin inverter 1HP tiết kiệm điện, làm lạnh nhanh. Công nghệ Eco Green R32.</p>',
                'user_id' => 1,
                'category_id' => 25, // Máy Lạnh
                'quanty' => '12',
            ],
            [
                'name' => 'Tủ Lạnh Samsung 236L',
                'price' => '8990000',
                'feature_image_path' => 'products/tu-lanh-samsung-236l.jpg',
                'content' => '<p>Tủ lạnh Samsung Digital Inverter 236L, tiết kiệm điện, ngăn đông mềm tiện lợi.</p>',
                'user_id' => 1,
                'category_id' => 26, // Tủ Lạnh
                'quanty' => '18',
            ],
            [
                'name' => 'Máy Giặt LG 9kg',
                'price' => '11990000',
                'feature_image_path' => 'products/may-giat-lg-9kg.jpg',
                'content' => '<p>Máy giặt LG AI DD 9kg với công nghệ trí tuệ nhân tạo, giặt sạch hiệu quả, tiết kiệm nước.</p>',
                'user_id' => 1,
                'category_id' => 28, // Máy Giặt
                'quanty' => '15',
            ],

            // Sách & Văn phòng phẩm
            [
                'name' => 'Laptop Dell Inspiron 15',
                'price' => '15990000',
                'feature_image_path' => 'products/laptop-dell-inspiron-15.jpg',
                'content' => '<p>Laptop Dell Inspiron 15 với CPU Intel Core i5, RAM 8GB, SSD 512GB. Phù hợp học tập, làm việc.</p>',
                'user_id' => 1,
                'category_id' => 20, // Laptop
                'quanty' => '22',
            ],
            [
                'name' => 'Bộ Bàn Ghế Văn Phòng',
                'price' => '3990000',
                'feature_image_path' => 'products/bo-ban-ghe-van-phong.jpg',
                'content' => '<p>Bộ bàn ghế văn phòng ergonomic, thiết kế hiện đại. Bàn gỗ công nghiệp, ghế có tựa lưng điều chỉnh.</p>',
                'user_id' => 1,
                'category_id' => 5, // Sách & Văn Phòng Phẩm (dùng parent category)
                'quanty' => '8',
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}