<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    public function run()
    {
        $sliders = [
            [
                'name' => 'Banner Chào Mừng EShopper',
                'description' => 'Chào mừng bạn đến với EShopper - Nơi mua sắm trực tuyến số 1 Việt Nam',
                'image' => 'sliders/banner-chao-mung-eshopper.jpg',
            ],
            [
                'name' => 'Thời Trang Mùa Hè Sale 50%',
                'description' => 'Khuyến mãi lớn thời trang mùa hè - Giảm đến 50% tất cả sản phẩm',
                'image' => 'sliders/banner-thoi-trang-mua-he-sale.jpg',
            ],
            [
                'name' => 'Siêu Phẩm Công Nghệ 2024',
                'description' => 'Ra mắt iPhone 15, Samsung Galaxy S24, MacBook Air M3 - Giá tốt nhất thị trường',
                'image' => 'sliders/banner-sieu-pham-cong-nghe-2024.jpg',
            ],
            [
                'name' => 'Gia Dụng Thông Minh Sale Sốc',
                'description' => 'Trang bị nhà thông minh - Gia dụng cao cấp giảm đến 70%',
                'image' => 'sliders/banner-gia-dung-thong-minh-sale.jpg',
            ],
            [
                'name' => 'Thể Thao & Sức Khỏe',
                'description' => 'Bộ sưu tập thể thao Nike, Adidas chính hãng - Miễn phí vận chuyển',
                'image' => 'sliders/banner-the-thao-suc-khoe.jpg',
            ],
            [
                'name' => 'Black Friday Mega Sale',
                'description' => 'Black Friday đã đến - Giảm giá cực sốc đến 80% toàn bộ sản phẩm',
                'image' => 'sliders/banner-black-friday-mega-sale.jpg',
            ],
            [
                'name' => 'Trang Sức & Phụ Kiện Cao Cấp',
                'description' => 'Bộ sưu tập trang sức và phụ kiện cao cấp - Làm đẹp phái nữ',
                'image' => 'sliders/banner-trang-suc-phu-kien.jpg',
            ]
        ];

        foreach ($sliders as $slider) {
            Slider::create($slider);
        }
    }
}