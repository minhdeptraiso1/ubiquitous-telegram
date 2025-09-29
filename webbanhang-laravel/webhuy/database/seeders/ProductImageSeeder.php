<?php

namespace Database\Seeders;

use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    public function run()
    {
        $productImages = [
            // Sản phẩm 1: Áo Sơ Mi Trắng Classic
            ['product_id' => 1, 'image_path' => 'products/ao-so-mi-trang-1.jpg', 'image_name' => 'ao-so-mi-trang-1.jpg'],
            ['product_id' => 1, 'image_path' => 'products/ao-so-mi-trang-2.jpg', 'image_name' => 'ao-so-mi-trang-2.jpg'],
            ['product_id' => 1, 'image_path' => 'products/ao-so-mi-trang-3.jpg', 'image_name' => 'ao-so-mi-trang-3.jpg'],

            // Sản phẩm 2: Áo Thun Nam Basic
            ['product_id' => 2, 'image_path' => 'products/ao-thun-nam-1.jpg', 'image_name' => 'ao-thun-nam-1.jpg'],
            ['product_id' => 2, 'image_path' => 'products/ao-thun-nam-2.jpg', 'image_name' => 'ao-thun-nam-2.jpg'],

            // Sản phẩm 3: Quần Jeans Nam Slim Fit
            ['product_id' => 3, 'image_path' => 'products/quan-jeans-nam-1.jpg', 'image_name' => 'quan-jeans-nam-1.jpg'],
            ['product_id' => 3, 'image_path' => 'products/quan-jeans-nam-2.jpg', 'image_name' => 'quan-jeans-nam-2.jpg'],
            ['product_id' => 3, 'image_path' => 'products/quan-jeans-nam-3.jpg', 'image_name' => 'quan-jeans-nam-3.jpg'],

            // Sản phẩm 4: Áo Khoác Bomber Nam
            ['product_id' => 4, 'image_path' => 'products/ao-khoac-bomber-1.jpg', 'image_name' => 'ao-khoac-bomber-1.jpg'],
            ['product_id' => 4, 'image_path' => 'products/ao-khoac-bomber-2.jpg', 'image_name' => 'ao-khoac-bomber-2.jpg'],

            // Sản phẩm 5: Váy Maxi Hoa Nhí
            ['product_id' => 5, 'image_path' => 'products/vay-maxi-1.jpg', 'image_name' => 'vay-maxi-1.jpg'],
            ['product_id' => 5, 'image_path' => 'products/vay-maxi-2.jpg', 'image_name' => 'vay-maxi-2.jpg'],
            ['product_id' => 5, 'image_path' => 'products/vay-maxi-3.jpg', 'image_name' => 'vay-maxi-3.jpg'],

            // Sản phẩm 6: Áo Blouse Trắng Công Sở
            ['product_id' => 6, 'image_path' => 'products/ao-blouse-1.jpg', 'image_name' => 'ao-blouse-1.jpg'],
            ['product_id' => 6, 'image_path' => 'products/ao-blouse-2.jpg', 'image_name' => 'ao-blouse-2.jpg'],

            // Sản phẩm 7: Đầm Dự Tiệc Đen
            ['product_id' => 7, 'image_path' => 'products/dam-du-tiec-1.jpg', 'image_name' => 'dam-du-tiec-1.jpg'],
            ['product_id' => 7, 'image_path' => 'products/dam-du-tiec-2.jpg', 'image_name' => 'dam-du-tiec-2.jpg'],
            ['product_id' => 7, 'image_path' => 'products/dam-du-tiec-3.jpg', 'image_name' => 'dam-du-tiec-3.jpg'],

            // Sản phẩm 8: Túi Xách Da Thật
            ['product_id' => 8, 'image_path' => 'products/tui-xach-da-1.jpg', 'image_name' => 'tui-xach-da-1.jpg'],
            ['product_id' => 8, 'image_path' => 'products/tui-xach-da-2.jpg', 'image_name' => 'tui-xach-da-2.jpg'],

            // Sản phẩm 9: iPhone 15 Pro Max
            ['product_id' => 9, 'image_path' => 'products/iphone-15-pro-max-1.jpg', 'image_name' => 'iphone-15-pro-max-1.jpg'],
            ['product_id' => 9, 'image_path' => 'products/iphone-15-pro-max-2.jpg', 'image_name' => 'iphone-15-pro-max-2.jpg'],
            ['product_id' => 9, 'image_path' => 'products/iphone-15-pro-max-3.jpg', 'image_name' => 'iphone-15-pro-max-3.jpg'],
            ['product_id' => 9, 'image_path' => 'products/iphone-15-pro-max-4.jpg', 'image_name' => 'iphone-15-pro-max-4.jpg'],

            // Sản phẩm 10: MacBook Air M2
            ['product_id' => 10, 'image_path' => 'products/macbook-air-m2-1.jpg', 'image_name' => 'macbook-air-m2-1.jpg'],
            ['product_id' => 10, 'image_path' => 'products/macbook-air-m2-2.jpg', 'image_name' => 'macbook-air-m2-2.jpg'],
            ['product_id' => 10, 'image_path' => 'products/macbook-air-m2-3.jpg', 'image_name' => 'macbook-air-m2-3.jpg'],

            // Sản phẩm 11: AirPods Pro 2
            ['product_id' => 11, 'image_path' => 'products/airpods-pro-2-1.jpg', 'image_name' => 'airpods-pro-2-1.jpg'],
            ['product_id' => 11, 'image_path' => 'products/airpods-pro-2-2.jpg', 'image_name' => 'airpods-pro-2-2.jpg'],

            // Sản phẩm 12: Canon EOS R5
            ['product_id' => 12, 'image_path' => 'products/canon-eos-r5-1.jpg', 'image_name' => 'canon-eos-r5-1.jpg'],
            ['product_id' => 12, 'image_path' => 'products/canon-eos-r5-2.jpg', 'image_name' => 'canon-eos-r5-2.jpg'],
            ['product_id' => 12, 'image_path' => 'products/canon-eos-r5-3.jpg', 'image_name' => 'canon-eos-r5-3.jpg'],

            // Sản phẩm 13: Apple Watch Series 9
            ['product_id' => 13, 'image_path' => 'products/apple-watch-series-9-1.jpg', 'image_name' => 'apple-watch-series-9-1.jpg'],
            ['product_id' => 13, 'image_path' => 'products/apple-watch-series-9-2.jpg', 'image_name' => 'apple-watch-series-9-2.jpg'],

            // Sản phẩm 14: Nồi Cơm Điện Tử Sharp
            ['product_id' => 14, 'image_path' => 'products/noi-com-dien-tu-sharp-1.jpg', 'image_name' => 'noi-com-dien-tu-sharp-1.jpg'],
            ['product_id' => 14, 'image_path' => 'products/noi-com-dien-tu-sharp-2.jpg', 'image_name' => 'noi-com-dien-tu-sharp-2.jpg'],

            // Sản phẩm 15: Máy Lạnh Daikin 1HP
            ['product_id' => 15, 'image_path' => 'products/may-lanh-daikin-1hp-1.jpg', 'image_name' => 'may-lanh-daikin-1hp-1.jpg'],
            ['product_id' => 15, 'image_path' => 'products/may-lanh-daikin-1hp-2.jpg', 'image_name' => 'may-lanh-daikin-1hp-2.jpg'],

            // Thêm ảnh cho các sản phẩm còn lại
            ['product_id' => 16, 'image_path' => 'products/tu-lanh-samsung-1.jpg', 'image_name' => 'tu-lanh-samsung-1.jpg'],
            ['product_id' => 17, 'image_path' => 'products/may-giat-lg-1.jpg', 'image_name' => 'may-giat-lg-1.jpg'],
            ['product_id' => 18, 'image_path' => 'products/laptop-dell-1.jpg', 'image_name' => 'laptop-dell-1.jpg'],
            ['product_id' => 19, 'image_path' => 'products/giay-nike-1.jpg', 'image_name' => 'giay-nike-1.jpg'],
            ['product_id' => 20, 'image_path' => 'products/tui-gym-1.jpg', 'image_name' => 'tui-gym-1.jpg'],
        ];

        foreach ($productImages as $image) {
            ProductImage::create($image);
        }
    }
}