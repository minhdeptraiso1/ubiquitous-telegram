<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Danh mục cha
        $parentCategories = [
            [
                'name' => 'Thời Trang Nam',
                'slug' => 'thoi-trang-nam',
                'parent_id' => 0
            ],
            [
                'name' => 'Thời Trang Nữ',
                'slug' => 'thoi-trang-nu',
                'parent_id' => 0
            ],
            [
                'name' => 'Điện Tử',
                'slug' => 'dien-tu',
                'parent_id' => 0
            ],
            [
                'name' => 'Gia Dụng',
                'slug' => 'gia-dung',
                'parent_id' => 0
            ],
            [
                'name' => 'Sách & Văn Phòng Phẩm',
                'slug' => 'sach-van-phong-pham',
                'parent_id' => 0
            ],
            [
                'name' => 'Thể Thao & Du Lịch',
                'slug' => 'the-thao-du-lich',
                'parent_id' => 0
            ]
        ];

        foreach ($parentCategories as $category) {
            Category::create($category);
        }

        // Danh mục con cho Thời Trang Nam
        $menSubCategories = [
            ['name' => 'Áo Sơ Mi', 'slug' => 'ao-so-mi-nam', 'parent_id' => 1],
            ['name' => 'Áo Thun', 'slug' => 'ao-thun-nam', 'parent_id' => 1],
            ['name' => 'Quần Jeans', 'slug' => 'quan-jeans-nam', 'parent_id' => 1],
            ['name' => 'Quần Kaki', 'slug' => 'quan-kaki-nam', 'parent_id' => 1],
            ['name' => 'Áo Khoác', 'slug' => 'ao-khoac-nam', 'parent_id' => 1],
            ['name' => 'Giày Sneaker', 'slug' => 'giay-sneaker-nam', 'parent_id' => 1],
        ];

        // Danh mục con cho Thời Trang Nữ
        $womenSubCategories = [
            ['name' => 'Váy', 'slug' => 'vay-nu', 'parent_id' => 2],
            ['name' => 'Áo Blouse', 'slug' => 'ao-blouse', 'parent_id' => 2],
            ['name' => 'Quần Jeans Nữ', 'slug' => 'quan-jeans-nu', 'parent_id' => 2],
            ['name' => 'Đầm', 'slug' => 'dam-nu', 'parent_id' => 2],
            ['name' => 'Túi Xách', 'slug' => 'tui-xach', 'parent_id' => 2],
            ['name' => 'Giày Cao Gót', 'slug' => 'giay-cao-got', 'parent_id' => 2],
        ];

        // Danh mục con cho Điện Tử
        $electronicSubCategories = [
            ['name' => 'Điện Thoại', 'slug' => 'dien-thoai', 'parent_id' => 3],
            ['name' => 'Laptop', 'slug' => 'laptop', 'parent_id' => 3],
            ['name' => 'Tai Nghe', 'slug' => 'tai-nghe', 'parent_id' => 3],
            ['name' => 'Máy Ảnh', 'slug' => 'may-anh', 'parent_id' => 3],
            ['name' => 'Smartwatch', 'slug' => 'smartwatch', 'parent_id' => 3],
        ];

        // Danh mục con cho Gia Dụng
        $homeSubCategories = [
            ['name' => 'Nồi Cơm Điện', 'slug' => 'noi-com-dien', 'parent_id' => 4],
            ['name' => 'Máy Lạnh', 'slug' => 'may-lanh', 'parent_id' => 4],
            ['name' => 'Tủ Lạnh', 'slug' => 'tu-lanh', 'parent_id' => 4],
            ['name' => 'Máy Giặt', 'slug' => 'may-giat', 'parent_id' => 4],
            ['name' => 'Lò Vi Sóng', 'slug' => 'lo-vi-song', 'parent_id' => 4],
        ];

        $allSubCategories = array_merge($menSubCategories, $womenSubCategories, $electronicSubCategories, $homeSubCategories);

        foreach ($allSubCategories as $category) {
            Category::create($category);
        }
    }
}