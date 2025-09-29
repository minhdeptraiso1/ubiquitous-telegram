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
                'name' => 'Banner Thời Trang Mùa Hè 2024',
                'description' => 'Khuyến mãi lớn - Giảm đến 50% cho tất cả sản phẩm thời trang',
                'image_path' => 'sliders/banner-thoi-trang-mua-he.jpg',
                'image_name' => 'banner-thoi-trang-mua-he.jpg'
            ],
            [
                'name' => 'Banner Điện Tử Công Nghệ',
                'description' => 'Ra mắt loạt sản phẩm công nghệ mới nhất - iPhone 15, MacBook Air M2',
                'image_path' => 'sliders/banner-dien-tu-cong-nghe.jpg',
                'image_name' => 'banner-dien-tu-cong-nghe.jpg'
            ],
            [
                'name' => 'Banner Gia Dụng Thông Minh',
                'description' => 'Trang bị nhà thông minh với các thiết bị gia dụng cao cấp',
                'image_path' => 'sliders/banner-gia-dung-thong-minh.jpg',
                'image_name' => 'banner-gia-dung-thong-minh.jpg'
            ],
            [
                'name' => 'Banner Thể Thao & Sức Khỏe',
                'description' => 'Bộ sưu tập thể thao mới - Nike, Adidas chính hãng',
                'image_path' => 'sliders/banner-the-thao-suc-khoe.jpg',
                'image_name' => 'banner-the-thao-suc-khoe.jpg'
            ],
            [
                'name' => 'Banner Khuyến Mãi Cuối Năm',
                'description' => 'Mega Sale cuối năm - Giảm giá sốc lên đến 70%',
                'image_path' => 'sliders/banner-khuyen-mai-cuoi-nam.jpg',
                'image_name' => 'banner-khuyen-mai-cuoi-nam.jpg'
            ]
        ];

        foreach ($sliders as $slider) {
            Slider::create($slider);
        }
    }
}