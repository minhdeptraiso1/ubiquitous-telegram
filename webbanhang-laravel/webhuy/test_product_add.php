<?php
/**
 * Script kiểm tra chức năng thêm sản phẩm
 * Chạy script này để debug các vấn đề có thể xảy ra
 */

// Kiểm tra các điều kiện cần thiết
echo "=== KIỂM TRA CHỨC NĂNG THÊM SẢN PHẨM ===\n\n";

// 1. Kiểm tra database connection
echo "1. Kiểm tra kết nối database...\n";
try {
    require_once 'vendor/autoload.php';
    $app = require_once 'bootstrap/app.php';
    $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
    
    $pdo = DB::connection()->getPdo();
    echo "✅ Kết nối database thành công\n\n";
} catch (Exception $e) {
    echo "❌ Lỗi kết nối database: " . $e->getMessage() . "\n\n";
}

// 2. Kiểm tra bảng products
echo "2. Kiểm tra cấu trúc bảng products...\n";
try {
    $columns = DB::select("SHOW COLUMNS FROM products");
    echo "✅ Bảng products tồn tại với các cột:\n";
    foreach ($columns as $column) {
        echo "   - {$column->Field} ({$column->Type})\n";
    }
    echo "\n";
} catch (Exception $e) {
    echo "❌ Lỗi kiểm tra bảng products: " . $e->getMessage() . "\n\n";
}

// 3. Kiểm tra bảng categories
echo "3. Kiểm tra bảng categories...\n";
try {
    $categoriesCount = DB::table('categories')->count();
    echo "✅ Bảng categories có {$categoriesCount} danh mục\n\n";
} catch (Exception $e) {
    echo "❌ Lỗi kiểm tra bảng categories: " . $e->getMessage() . "\n\n";
}

// 4. Kiểm tra thư mục storage
echo "4. Kiểm tra quyền ghi thư mục storage...\n";
$storagePublic = storage_path('app/public');
if (is_writable($storagePublic)) {
    echo "✅ Thư mục storage có quyền ghi\n";
} else {
    echo "❌ Thư mục storage không có quyền ghi\n";
}

// Tạo symbolic link nếu chưa có
$publicStorage = public_path('storage');
if (!file_exists($publicStorage)) {
    echo "⚠️  Symbolic link storage chưa tạo. Hãy chạy: php artisan storage:link\n";
} else {
    echo "✅ Symbolic link storage đã tồn tại\n";
}

echo "\n";

// 5. Kiểm tra user authentication
echo "5. Kiểm tra authentication middleware...\n";
echo "ℹ️  Đảm bảo user đã đăng nhập trước khi thêm sản phẩm\n\n";

// 6. Gợi ý debug
echo "=== GỢI Ý DEBUG ===\n";
echo "1. Kiểm tra file log: storage/logs/laravel.log\n";
echo "2. Bật debug mode trong .env: APP_DEBUG=true\n";
echo "3. Kiểm tra network tab trong Developer Tools khi submit form\n";
echo "4. Đảm bảo CSRF token được gửi đúng\n";
echo "5. Kiểm tra validation errors được hiển thị\n";

echo "\n=== CÁC BƯỚC KIỂM TRA MANUAL ===\n";
echo "1. Đăng nhập vào admin\n";
echo "2. Vào trang thêm sản phẩm\n";
echo "3. Điền đầy đủ thông tin:\n";
echo "   - Tên sản phẩm (ít nhất 5 ký tự, không trùng)\n";
echo "   - Giá (số dương)\n";
echo "   - Số lượng (số nguyên dương)\n";
echo "   - Chọn danh mục\n";
echo "   - Upload ảnh đại diện (jpg, png, gif, tối đa 2MB)\n";
echo "   - Nhập nội dung (ít nhất 10 ký tự)\n";
echo "4. Submit form và kiểm tra:\n";
echo "   - Có thông báo thành công không?\n";
echo "   - Có redirect về danh sách sản phẩm không?\n";
echo "   - Sản phẩm có xuất hiện trong danh sách không?\n";

?>