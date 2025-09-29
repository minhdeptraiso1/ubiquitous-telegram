# Hướng Dẫn Chạy Seeders - Dữ Liệu Mẫu

## Dự Án EShopper & WebHuy E-commerce

Đây là hướng dẫn chi tiết để chạy dữ liệu mẫu cho cả hai project:

- **EShopper**: Frontend user (khách hàng mua sắm)
- **WebHuy**: Backend admin (quản lý hệ thống)

## 📋 Cấu Trúc Dữ Liệu Mẫu

### 🛍️ EShopper Project (Frontend)

- **Users**: 18 tài khoản người dùng mẫu
- **Categories**: 8 danh mục cha + 26 danh mục con
- **Products**: 30 sản phẩm đa dạng với mô tả chi tiết
- **ProductImages**: 80+ ảnh sản phẩm
- **Sliders**: 7 banner quảng cáo
- **Customers**: 20 khách hàng mẫu
- **Orders**: 15 đơn hàng với chi tiết sản phẩm

### 🔧 WebHuy Project (Admin)

- **Users**: 5 tài khoản admin/staff
- **Categories**: 6 danh mục cha + 23 danh mục con
- **Products**: 20 sản phẩm quản lý
- **ProductImages**: 50+ ảnh sản phẩm
- **Sliders**: 5 banner quản lý
- **Customers**: 15 khách hàng
- **Orders**: 10 đơn hàng quản lý
- **Menus**: 12 menu điều hướng

## 🚀 Cách Chạy Seeders

### 1. Project EShopper (Frontend)

```bash
cd d:\code_laravel_php\webbanhang-laravel\eshopper
php artisan db:seed
```

Hoặc chạy từng seeder riêng biệt:

```bash
php artisan db:seed --class=UserSeeder
php artisan db:seed --class=CategorySeeder
php artisan db:seed --class=ProductSeeder
php artisan db:seed --class=ProductImageSeeder
php artisan db:seed --class=SliderSeeder
php artisan db:seed --class=CustomerSeeder
php artisan db:seed --class=OrderSeeder
```

### 2. Project WebHuy (Admin)

```bash
cd d:\code_laravel_php\webbanhang-laravel\webhuy
php artisan db:seed
```

Hoặc chạy từng seeder riêng biệt:

```bash
php artisan db:seed --class=AdminUserSeeder
php artisan db:seed --class=UserSeeder
php artisan db:seed --class=CategorySeeder
php artisan db:seed --class=ProductSeeder
php artisan db:seed --class=ProductImageSeeder
php artisan db:seed --class=SliderSeeder
php artisan db:seed --class=CustomerSeeder
php artisan db:seed --class=OrderSeeder
php artisan db:seed --class=MenuSeeder
```

## 📊 Chi Tiết Dữ Liệu Mẫu

### 👥 Tài Khoản Mẫu

#### EShopper (User Accounts)

- **Test User**: test@eshopper.com / password
- **Demo User**: demo@eshopper.com / demo123
- **Customer Service**: support@eshopper.com / support123
- **15 tài khoản user khác**: [tên]@gmail.com / password

#### WebHuy (Admin Accounts)

- **Super Administrator**: admin@eshopper.com / admin123
- **Manager**: manager@eshopper.com / manager123
- **Staff Member**: staff@eshopper.com / staff123
- **Admin từ seeder ban đầu**: admin@example.com / admin123

### 🏷️ Danh Mục Sản Phẩm

**Danh mục chính:**

- Thời Trang Nam & Nữ
- Điện Tử & Công Nghệ
- Gia Dụng & Đời Sống
- Sách & Văn Phòng Phẩm
- Thể Thao & Du Lịch
- Mẹ & Bé
- Làm Đẹp & Sức Khỏe

### 🛒 Sản Phẩm Nổi Bật

**Thời trang:**

- Áo Sơ Mi Trắng Oxford - 299,000đ
- Quần Jeans Nam Skinny Fit - 450,000đ
- Váy Midi Hoa Nhí - 380,000đ
- Đầm Công Sở Đen - 580,000đ

**Công nghệ:**

- iPhone 15 128GB - 22,990,000đ
- Samsung Galaxy S24 Ultra - 33,990,000đ
- MacBook Air M3 13 inch - 32,990,000đ
- Sony WH-1000XM5 - 8,990,000đ

**Gia dụng:**

- Nồi Cơm Điện Sharp 1.8L - 2,990,000đ
- Máy Lạnh LG Inverter 1.5HP - 11,990,000đ
- Tủ Lạnh Panasonic 326L - 12,990,000đ

### 📦 Đơn Hàng Mẫu

**Trạng thái đơn hàng:**

- Chờ xử lý
- Đã xác nhận
- Đang giao hàng
- Đã giao
- Đã hủy

**Tổng giá trị đơn hàng:** Từ 299,000đ đến 65,990,000đ

### 🎨 Banner & Slider

**EShopper:**

- Banner Chào Mừng EShopper
- Thời Trang Mùa Hè Sale 50%
- Siêu Phẩm Công Nghệ 2024
- Black Friday Mega Sale
- Trang Sức & Phụ Kiện Cao Cấp

**WebHuy:**

- Banner Thời Trang Mùa Hè 2024
- Banner Điện Tử Công Nghệ
- Banner Gia Dụng Thông Minh
- Banner Khuyến Mãi Cuối Năm

## 🔄 Reset Dữ Liệu

Để reset và chạy lại seeders:

```bash
# EShopper
cd eshopper
php artisan migrate:fresh --seed

# WebHuy
cd ../webhuy
php artisan migrate:fresh --seed
```

## 📁 Cấu Trúc Thư Mục Ảnh

Lưu ý: Cần tạo thư mục và upload ảnh tương ứng:

```
public/
├── storage/
│   ├── products/
│   │   ├── ao-so-mi-trang-oxford-1.jpg
│   │   ├── iphone-15-128gb-1.jpg
│   │   └── ...
│   └── sliders/
│       ├── banner-chao-mung-eshopper.jpg
│       ├── banner-thoi-trang-mua-he-sale.jpg
│       └── ...
```

## 🎯 Mục Đích Sử Dụng

Dữ liệu mẫu này được tạo để:

- **Demo sản phẩm** cho khách hàng và nhà đầu tư
- **Testing** các chức năng của hệ thống
- **Development** và debug
- **Training** cho team phát triển
- **Presentation** cho stakeholders

## ⚠️ Lưu Ý Quan Trọng

1. **Backup dữ liệu** trước khi chạy seeders trên môi trường production
2. **Ảnh sản phẩm** cần được upload thủ công vào thư mục tương ứng
3. **Giá sản phẩm** được set theo giá thị trường thực tế (VND)
4. **Email accounts** sử dụng domain gmail.com để test
5. **Số điện thoại** sử dụng format Việt Nam (09xx, 08xx)

## 🔧 Troubleshooting

**Nếu gặp lỗi foreign key:**

```bash
php artisan migrate:fresh
php artisan db:seed
```

**Nếu thiếu Model:**

```bash
composer dump-autoload
```

**Nếu lỗi permission:**

```bash
php artisan storage:link
chmod -R 755 storage/
```

---

_Tạo bởi: GitHub Copilot_  
_Ngày: 27/09/2025_
