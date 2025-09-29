<?php

namespace Database\Seeders;

use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    public function run()
    {
        $productImages = [
            // Sản phẩm 1: Áo Sơ Mi Trắng Oxford
            ['product_id' => 1, 'image' => 'products/ao-so-mi-trang-oxford-1.jpg'],
            ['product_id' => 1, 'image' => 'products/ao-so-mi-trang-oxford-2.jpg'],
            ['product_id' => 1, 'image' => 'products/ao-so-mi-trang-oxford-3.jpg'],

            // Sản phẩm 2: Áo Thun Nam Cotton Premium
            ['product_id' => 2, 'image' => 'products/ao-thun-nam-cotton-1.jpg'],
            ['product_id' => 2, 'image' => 'products/ao-thun-nam-cotton-2.jpg'],
            ['product_id' => 2, 'image' => 'products/ao-thun-nam-cotton-3.jpg'],

            // Sản phẩm 3: Quần Jeans Nam Skinny Fit
            ['product_id' => 3, 'image' => 'products/quan-jeans-nam-skinny-1.jpg'],
            ['product_id' => 3, 'image' => 'products/quan-jeans-nam-skinny-2.jpg'],
            ['product_id' => 3, 'image' => 'products/quan-jeans-nam-skinny-3.jpg'],

            // Sản phẩm 4: Quần Kaki Nam Slimfit
            ['product_id' => 4, 'image' => 'products/quan-kaki-nam-slimfit-1.jpg'],
            ['product_id' => 4, 'image' => 'products/quan-kaki-nam-slimfit-2.jpg'],

            // Sản phẩm 5: Áo Khoác Hoodie Nam
            ['product_id' => 5, 'image' => 'products/ao-khoac-hoodie-nam-1.jpg'],
            ['product_id' => 5, 'image' => 'products/ao-khoac-hoodie-nam-2.jpg'],
            ['product_id' => 5, 'image' => 'products/ao-khoac-hoodie-nam-3.jpg'],

            // Sản phẩm 6: Giày Sneaker Nam Classic
            ['product_id' => 6, 'image' => 'products/giay-sneaker-nam-classic-1.jpg'],
            ['product_id' => 6, 'image' => 'products/giay-sneaker-nam-classic-2.jpg'],
            ['product_id' => 6, 'image' => 'products/giay-sneaker-nam-classic-3.jpg'],

            // Sản phẩm 7: Váy Midi Hoa Nhí
            ['product_id' => 7, 'image' => 'products/vay-midi-hoa-nhi-1.jpg'],
            ['product_id' => 7, 'image' => 'products/vay-midi-hoa-nhi-2.jpg'],
            ['product_id' => 7, 'image' => 'products/vay-midi-hoa-nhi-3.jpg'],

            // Sản phẩm 8: Áo Blouse Lụa Cao Cấp
            ['product_id' => 8, 'image' => 'products/ao-blouse-lua-cao-cap-1.jpg'],
            ['product_id' => 8, 'image' => 'products/ao-blouse-lua-cao-cap-2.jpg'],

            // Sản phẩm 9: Quần Jeans Nữ High Waist
            ['product_id' => 9, 'image' => 'products/quan-jeans-nu-high-waist-1.jpg'],
            ['product_id' => 9, 'image' => 'products/quan-jeans-nu-high-waist-2.jpg'],
            ['product_id' => 9, 'image' => 'products/quan-jeans-nu-high-waist-3.jpg'],

            // Sản phẩm 10: Đầm Công Sở Đen
            ['product_id' => 10, 'image' => 'products/dam-cong-so-den-1.jpg'],
            ['product_id' => 10, 'image' => 'products/dam-cong-so-den-2.jpg'],
            ['product_id' => 10, 'image' => 'products/dam-cong-so-den-3.jpg'],

            // Thêm ảnh cho các sản phẩm còn lại (rút gọn để tiết kiệm)
            ['product_id' => 11, 'image' => 'products/tui-xach-nu-da-pu-1.jpg'],
            ['product_id' => 12, 'image' => 'products/giay-cao-got-7cm-1.jpg'],
            ['product_id' => 13, 'image' => 'products/iphone-15-128gb-1.jpg'],
            ['product_id' => 14, 'image' => 'products/samsung-galaxy-s24-ultra-1.jpg'],
            ['product_id' => 15, 'image' => 'products/macbook-air-m3-13inch-1.jpg'],
            ['product_id' => 16, 'image' => 'products/dell-inspiron-15-3520-1.jpg'],
            ['product_id' => 17, 'image' => 'products/sony-wh-1000xm5-1.jpg'],
            ['product_id' => 18, 'image' => 'products/airpods-pro-2nd-gen-1.jpg'],
            ['product_id' => 19, 'image' => 'products/canon-eos-r6-mark-ii-1.jpg'],
            ['product_id' => 20, 'image' => 'products/apple-watch-series-9-gps-1.jpg'],
            ['product_id' => 21, 'image' => 'products/smart-tv-samsung-55inch-4k-1.jpg'],
            ['product_id' => 22, 'image' => 'products/noi-com-dien-sharp-1-8l-1.jpg'],
            ['product_id' => 23, 'image' => 'products/may-lanh-lg-inverter-1-5hp-1.jpg'],
            ['product_id' => 24, 'image' => 'products/tu-lanh-panasonic-326l-1.jpg'],
            ['product_id' => 25, 'image' => 'products/may-giat-samsung-10kg-1.jpg'],
            ['product_id' => 26, 'image' => 'products/lo-vi-song-electrolux-23l-1.jpg'],
            ['product_id' => 27, 'image' => 'products/may-xay-sinh-to-philips-1.jpg'],
            ['product_id' => 28, 'image' => 'products/giay-chay-bo-nike-revolution-7-1.jpg'],
            ['product_id' => 29, 'image' => 'products/balo-du-lich-samsonite-25l-1.jpg'],
            ['product_id' => 30, 'image' => 'products/day-nhay-the-thao-cao-cap-1.jpg'],
        ];

        foreach ($productImages as $image) {
            ProductImage::create($image);
        }
    }
}