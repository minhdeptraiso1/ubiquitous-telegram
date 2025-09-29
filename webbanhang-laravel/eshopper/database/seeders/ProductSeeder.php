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
                'name' => 'Áo Sơ Mi Trắng Oxford',
                'description' => 'Áo sơ mi trắng Oxford chất lượng cao, phù hợp cho công việc và các dịp quan trọng. Chất liệu cotton 100% thoáng mát.',
                'price' => 299000.00,
                'image' => 'products/ao-so-mi-trang-oxford.jpg',
                'category_id' => 9, // Áo Sơ Mi Nam
                'stock' => 50,
            ],
            [
                'name' => 'Áo Thun Nam Cotton Premium',
                'description' => 'Áo thun nam chất liệu cotton premium, form áo vừa vặn, màu sắc đa dạng phù hợp mọi phong cách.',
                'price' => 149000.00,
                'image' => 'products/ao-thun-nam-cotton.jpg',
                'category_id' => 10, // Áo Thun Nam
                'stock' => 100,
            ],
            [
                'name' => 'Quần Jeans Nam Skinny Fit',
                'description' => 'Quần jeans nam dáng skinny fit hiện đại, chất liệu denim cao cấp co giãn thoải mái.',
                'price' => 450000.00,
                'image' => 'products/quan-jeans-nam-skinny.jpg',
                'category_id' => 11, // Quần Jeans Nam
                'stock' => 75,
            ],
            [
                'name' => 'Quần Kaki Nam Slimfit',
                'description' => 'Quần kaki nam dáng slimfit thanh lịch, chất liệu kaki cao cấp không nhăn, phù hợp đi làm.',
                'price' => 320000.00,
                'image' => 'products/quan-kaki-nam-slimfit.jpg',
                'category_id' => 12, // Quần Kaki Nam
                'stock' => 60,
            ],
            [
                'name' => 'Áo Khoác Hoodie Nam',
                'description' => 'Áo khoác hoodie nam năng động, chất liệu nỉ cotton ấm áp, phù hợp thời tiết mát mẻ.',
                'price' => 399000.00,
                'image' => 'products/ao-khoac-hoodie-nam.jpg',
                'category_id' => 13, // Áo Khoác Nam
                'stock' => 40,
            ],
            [
                'name' => 'Giày Sneaker Nam Classic',
                'description' => 'Giày sneaker nam phong cách classic, đế cao su bền bỉ, thiết kế trẻ trung năng động.',
                'price' => 890000.00,
                'image' => 'products/giay-sneaker-nam-classic.jpg',
                'category_id' => 14, // Giày Dép Nam
                'stock' => 30,
            ],

            // Thời trang nữ
            [
                'name' => 'Váy Midi Hoa Nhí',
                'description' => 'Váy midi họa tiết hoa nhí nữ tính, chất liệu voan nhẹ nhàng, phù hợp dạo phố và đi chơi.',
                'price' => 380000.00,
                'image' => 'products/vay-midi-hoa-nhi.jpg',
                'category_id' => 16, // Váy Nữ
                'stock' => 45,
            ],
            [
                'name' => 'Áo Blouse Lụa Cao Cấp',
                'description' => 'Áo blouse lụa cao cấp thanh lịch, thiết kế sang trọng phù hợp môi trường công sở.',
                'price' => 450000.00,
                'image' => 'products/ao-blouse-lua-cao-cap.jpg',
                'category_id' => 17, // Áo Blouse
                'stock' => 35,
            ],
            [
                'name' => 'Quần Jeans Nữ High Waist',
                'description' => 'Quần jeans nữ cạp cao tôn dáng, chất liệu denim co giãn thoải mái, phù hợp mọi vóc dáng.',
                'price' => 420000.00,
                'image' => 'products/quan-jeans-nu-high-waist.jpg',
                'category_id' => 18, // Quần Jeans Nữ
                'stock' => 55,
            ],
            [
                'name' => 'Đầm Công Sở Đen',
                'description' => 'Đầm công sở màu đen thanh lịch, thiết kế ôm dáng vừa phải, phù hợp các buổi họp quan trọng.',
                'price' => 580000.00,
                'image' => 'products/dam-cong-so-den.jpg',
                'category_id' => 19, // Đầm Nữ
                'stock' => 40,
            ],
            [
                'name' => 'Túi Xách Nữ Da PU',
                'description' => 'Túi xách nữ chất liệu da PU cao cấp, nhiều ngăn tiện dụng, phù hợp đi làm và đi chơi.',
                'price' => 650000.00,
                'image' => 'products/tui-xach-nu-da-pu.jpg',
                'category_id' => 20, // Túi Xách
                'stock' => 25,
            ],
            [
                'name' => 'Giày Cao Gót 7cm',
                'description' => 'Giày cao gót 7cm thanh lịch, chất liệu da mềm thoải mái, phù hợp các buổi tiệc và công sở.',
                'price' => 750000.00,
                'image' => 'products/giay-cao-got-7cm.jpg',
                'category_id' => 21, // Giày Cao Gót
                'stock' => 20,
            ],

            // Điện tử & Công nghệ
            [
                'name' => 'iPhone 15 128GB',
                'description' => 'iPhone 15 128GB chính hãng VN/A, chip A16 Bionic mạnh mẽ, camera 48MP chụp ảnh siêu nét.',
                'price' => 22990000.00,
                'image' => 'products/iphone-15-128gb.jpg',
                'category_id' => 23, // Điện Thoại
                'stock' => 15,
            ],
            [
                'name' => 'Samsung Galaxy S24 Ultra',
                'description' => 'Samsung Galaxy S24 Ultra với bút S Pen, màn hình Dynamic AMOLED 6.8 inch, camera 200MP.',
                'price' => 33990000.00,
                'image' => 'products/samsung-galaxy-s24-ultra.jpg',
                'category_id' => 23, // Điện Thoại
                'stock' => 12,
            ],
            [
                'name' => 'MacBook Air M3 13 inch',
                'description' => 'MacBook Air M3 13 inch với chip M3 mạnh mẽ, RAM 8GB, SSD 256GB, thời lượng pin lên đến 18 tiếng.',
                'price' => 32990000.00,
                'image' => 'products/macbook-air-m3-13inch.jpg',
                'category_id' => 24, // Laptop
                'stock' => 8,
            ],
            [
                'name' => 'Dell Inspiron 15 3520',
                'description' => 'Laptop Dell Inspiron 15 3520, Intel Core i5-1235U, RAM 8GB, SSD 512GB, phù hợp học tập và làm việc.',
                'price' => 14990000.00,
                'image' => 'products/dell-inspiron-15-3520.jpg',
                'category_id' => 24, // Laptop
                'stock' => 20,
            ],
            [
                'name' => 'Sony WH-1000XM5',
                'description' => 'Tai nghe Sony WH-1000XM5 chống ồn chủ động, chất lượng âm thanh Hi-Res, thời lượng pin 30 tiếng.',
                'price' => 8990000.00,
                'image' => 'products/sony-wh-1000xm5.jpg',
                'category_id' => 25, // Tai Nghe
                'stock' => 25,
            ],
            [
                'name' => 'AirPods Pro 2nd Gen',
                'description' => 'AirPods Pro thế hệ 2 với chip H2, chống ồn chủ động cải tiến, âm thanh spatial audio sống động.',
                'price' => 6490000.00,
                'image' => 'products/airpods-pro-2nd-gen.jpg',
                'category_id' => 25, // Tai Nghe
                'stock' => 30,
            ],
            [
                'name' => 'Canon EOS R6 Mark II',
                'description' => 'Máy ảnh Canon EOS R6 Mark II mirrorless, cảm biến full-frame 24.2MP, quay video 4K 60fps.',
                'price' => 65990000.00,
                'image' => 'products/canon-eos-r6-mark-ii.jpg',
                'category_id' => 26, // Máy Ảnh
                'stock' => 5,
            ],
            [
                'name' => 'Apple Watch Series 9 GPS',
                'description' => 'Apple Watch Series 9 GPS với chip S9, màn hình Retina luôn bật, theo dõi sức khỏe toàn diện.',
                'price' => 9990000.00,
                'image' => 'products/apple-watch-series-9-gps.jpg',
                'category_id' => 27, // Smartwatch
                'stock' => 18,
            ],
            [
                'name' => 'Smart TV Samsung 55 inch 4K',
                'description' => 'Smart TV Samsung 55 inch 4K Crystal UHD, HDR10+, hệ điều hành Tizen OS, kết nối WiFi.',
                'price' => 13990000.00,
                'image' => 'products/smart-tv-samsung-55inch-4k.jpg',
                'category_id' => 28, // Tivi
                'stock' => 10,
            ],

            // Gia dụng & Đời sống
            [
                'name' => 'Nồi Cơm Điện Sharp 1.8L',
                'description' => 'Nồi cơm điện Sharp KS-COM18V 1.8L, công nghệ fuzzy logic, nấu cơm ngon đều tăm.',
                'price' => 2990000.00,
                'image' => 'products/noi-com-dien-sharp-1-8l.jpg',
                'category_id' => 29, // Nồi Cơm Điện
                'stock' => 35,
            ],
            [
                'name' => 'Máy Lạnh LG Inverter 1.5HP',
                'description' => 'Máy lạnh LG V13WIN1 Inverter 1.5HP, tiết kiệm điện, làm lạnh nhanh, kháng khuẩn Nano Silver.',
                'price' => 11990000.00,
                'image' => 'products/may-lanh-lg-inverter-1-5hp.jpg',
                'category_id' => 30, // Máy Lạnh
                'stock' => 15,
            ],
            [
                'name' => 'Tủ Lạnh Panasonic 326L',
                'description' => 'Tủ lạnh Panasonic NR-BL351GKVN 326L, công nghệ Inverter tiết kiệm điện, ngăn đông mềm tiện lợi.',
                'price' => 12990000.00,
                'image' => 'products/tu-lanh-panasonic-326l.jpg',
                'category_id' => 31, // Tủ Lạnh
                'stock' => 12,
            ],
            [
                'name' => 'Máy Giặt Samsung 10kg',
                'description' => 'Máy giặt Samsung WA10T5260BY 10kg, công nghệ Wobble giặt sạch hiệu quả, tiết kiệm nước và điện.',
                'price' => 8990000.00,
                'image' => 'products/may-giat-samsung-10kg.jpg',
                'category_id' => 32, // Máy Giặt
                'stock' => 18,
            ],
            [
                'name' => 'Lò Vi Sóng Electrolux 23L',
                'description' => 'Lò vi sóng Electrolux EMM23K38GB 23L, 6 mức công suất, chức năng rã đông tự động.',
                'price' => 2290000.00,
                'image' => 'products/lo-vi-song-electrolux-23l.jpg',
                'category_id' => 33, // Lò Vi Sóng
                'stock' => 25,
            ],
            [
                'name' => 'Máy Xay Sinh Tố Philips',
                'description' => 'Máy xay sinh tố Philips HR2157 với 6 lưỡi dao ProBlend, công suất 1000W, cối nhựa 2L.',
                'price' => 1490000.00,
                'image' => 'products/may-xay-sinh-to-philips.jpg',
                'category_id' => 34, // Đồ Gia Dụng Nhỏ
                'stock' => 40,
            ],

            // Thể thao & Du lịch
            [
                'name' => 'Giày Chạy Bộ Nike Revolution 7',
                'description' => 'Giày chạy bộ Nike Revolution 7, đệm phylon mềm mại, upper lưới thoáng khí, phù hợp mọi địa hình.',
                'price' => 1890000.00,
                'image' => 'products/giay-chay-bo-nike-revolution-7.jpg',
                'category_id' => 6, // Thể Thao & Du Lịch
                'stock' => 50,
            ],
            [
                'name' => 'Balo Du Lịch Samsonite 25L',
                'description' => 'Balo du lịch Samsonite 25L chất liệu polyester bền bỉ, thiết kế nhiều ngăn tiện dụng.',
                'price' => 2890000.00,
                'image' => 'products/balo-du-lich-samsonite-25l.jpg',
                'category_id' => 6, // Thể Thao & Du Lịch
                'stock' => 30,
            ],
            [
                'name' => 'Dây Nhảy Thể Thao Cao Cấp',
                'description' => 'Dây nhảy thể thao cao cấp với tay cầm chống trượt, dây cáp thép bọc PVC bền bỉ.',
                'price' => 299000.00,
                'image' => 'products/day-nhay-the-thao-cao-cap.jpg',
                'category_id' => 6, // Thể Thao & Du Lịch
                'stock' => 100,
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}