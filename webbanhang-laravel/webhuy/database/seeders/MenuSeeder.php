<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run()
    {
        $menus = [
            [
                'name' => 'Trang chủ',
                'parent_id' => 0,
                'slug' => 'trang-chu'
            ],
            [
                'name' => 'Thời trang',
                'parent_id' => 0,
                'slug' => 'thoi-trang'
            ],
            [
                'name' => 'Thời trang nam',
                'parent_id' => 2,
                'slug' => 'thoi-trang-nam'
            ],
            [
                'name' => 'Thời trang nữ',
                'parent_id' => 2,
                'slug' => 'thoi-trang-nu'
            ],
            [
                'name' => 'Điện tử',
                'parent_id' => 0,
                'slug' => 'dien-tu'
            ],
            [
                'name' => 'Điện thoại',
                'parent_id' => 5,
                'slug' => 'dien-thoai'
            ],
            [
                'name' => 'Laptop',
                'parent_id' => 5,
                'slug' => 'laptop'
            ],
            [
                'name' => 'Gia dụng',
                'parent_id' => 0,
                'slug' => 'gia-dung'
            ],
            [
                'name' => 'Thể thao',
                'parent_id' => 0,
                'slug' => 'the-thao'
            ],
            [
                'name' => 'Về chúng tôi',
                'parent_id' => 0,
                'slug' => 've-chung-toi'
            ],
            [
                'name' => 'Liên hệ',
                'parent_id' => 0,
                'slug' => 'lien-he'
            ],
            [
                'name' => 'Tin tức',
                'parent_id' => 0,
                'slug' => 'tin-tuc'
            ]
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}