# Hướng Dẫn Liên Kết Database Giữa EShopper và WebHuy

## Vấn Đề Ban Đầu

- **EShopper** (frontend): Sử dụng prefix `esh_` cho bảng
- **WebHuy** (admin): Sử dụng prefix `wh_` cho bảng
- Cả hai dùng database `shop_shared` nhưng không chia sẻ dữ liệu
- Khi WebHuy thêm/xóa sản phẩm → EShopper không thấy thay đổi
- Khi EShopper đặt hàng → WebHuy không nhận được đơn hàng

## Giải Pháp Đã Thực Hiện

### 1. Tạo Database Connection Chia Sẻ

**File:** `eshopper/config/database.php`

```php
'shared' => [
    'driver' => 'mysql',
    'host' => env('DB_HOST', '127.0.0.1'),
    'port' => env('DB_PORT', '3306'),
    'database' => env('DB_DATABASE', 'forge'),
    'username' => env('DB_USERNAME', 'forge'),
    'password' => env('DB_PASSWORD', ''),
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'prefix' => 'wh_', // Sử dụng prefix của WebHuy
],
```

### 2. Cập Nhật Model EShopper

Tất cả Model quan trọng đã được cập nhật để sử dụng connection `shared`:

#### Product.php

```php
class Product extends Model
{
    use SoftDeletes;
    protected $connection = 'shared'; // Kết nối chia sẻ
    protected $table = "products";    // Laravel sẽ thêm prefix wh_
}
```

#### Order.php

```php
class Order extends Model
{
    use HasFactory;
    protected $connection = 'shared';
    protected $table = "orders";
}
```

#### Order_Item.php

```php
class Order_Item extends Model
{
    use HasFactory;
    protected $connection = 'shared';
    protected $table = "order__items";
}
```

#### Category.php

```php
class Category extends Model
{
    use SoftDeletes;
    protected $connection = 'shared';
    protected $table = "categories";
}
```

#### Customer.php & ProductImage.php

Cả hai cũng đã được cấu hình tương tự.

## Kết Quả

### ✅ Hoạt Động Thành Công

1. **EShopper đọc sản phẩm từ WebHuy**: 13 products
2. **EShopper đọc danh mục từ WebHuy**: 28 categories
3. **Đơn hàng EShopper → WebHuy**: 10 orders
4. **Dữ liệu được đồng bộ real-time**

### 🔄 Luồng Dữ Liệu

```
WebHuy (Admin) → wh_products → EShopper (Frontend)
EShopper (Khách hàng) → wh_orders → WebHuy (Admin)
```

## Cách Sử Dụng

### Admin WebHuy:

- Thêm/sửa/xóa sản phẩm → Tự động hiển thị trên EShopper
- Xem đơn hàng từ khách hàng EShopper
- Quản lý danh mục chung

### Frontend EShopper:

- Hiển thị sản phẩm từ WebHuy
- Đặt hàng vào hệ thống WebHuy
- Sử dụng danh mục từ WebHuy

## Lưu Ý Kỹ Thuật

1. **Cache**: Chạy `php artisan config:clear` sau mỗi thay đổi
2. **Server**: Cả hai server cần restart sau khi sửa Model
3. **Backup**: Luôn backup database trước khi thay đổi
4. **Testing**: Test cả thêm sản phẩm và đặt hàng để đảm bảo hoạt động

## Kiểm Tra Hoạt Động

```bash
# EShopper
php artisan tinker --execute="echo App\Models\Product::count();"

# WebHuy
php artisan tinker --execute="echo App\Models\Order::count();"
```

**Trạng thái:** ✅ HOÀN THÀNH - Database đã được liên kết thành công!
