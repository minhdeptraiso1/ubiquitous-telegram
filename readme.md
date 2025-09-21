# Web Bán Hàng Laravel (2 dự án: eshopper & webhuy)

Dự án này gồm 2 ứng dụng Laravel độc lập nằm trong một workspace:

- `webbanhang-laravel/eshopper`: Website bán hàng (frontend) cho khách hàng.
- `webbanhang-laravel/webhuy`: Trang quản trị (admin) để quản lý danh mục, sản phẩm, slider, người dùng, đơn hàng.

Bạn có thể chạy song song cả hai ứng dụng trên các port khác nhau (gợi ý: eshopper 8000, webhuy 8001).

---

## 1) Công nghệ & Phiên bản

- Laravel: 9.52.x (theo `composer.lock`)
- PHP: >= 8.0.2
- Composer: v2.x
- MySQL/MariaDB: (khuyên dùng MySQL 8 hoặc MariaDB 10.x, có thể dùng XAMPP/WAMP)
- Node.js: >= 16 (đã dùng Vite 4)
- NPM: >= 8
- Vite: ^4.0.0
- laravel-vite-plugin: ^0.7.x
- Một số package PHP khác: `laravel/sanctum`, `laravel/tinker`, `fakerphp/faker`, `spatie/laravel-ignition`, ...

Các extension PHP thường cần (Laravel):

- `bcmath`, `ctype`, `fileinfo`, `json`, `mbstring`, `openssl`, `pdo`, `tokenizer`, `xml`

---

## 2) Yêu cầu cài đặt trước

1. Cài XAMPP (hoặc WAMP) để có Apache + MySQL + PHP (Windows). Bật ít nhất:
   - Apache (cổng ví dụ 80 hoặc 8888)
   - MySQL (cổng mặc định 3306)
   - phpMyAdmin truy cập theo cổng Apache, ví dụ:
     - `http://localhost/phpmyadmin` hoặc `http://localhost:8888/phpmyadmin`
2. Cài Composer 2.x: https://getcomposer.org/
3. Cài Node.js LTS (>=16): https://nodejs.org/ (NPM đi kèm)

---

## 3) Cấu trúc thư mục chính

```
webbanhang-laravel/
	eshopper/   # app frontend cho khách
	webhuy/     # app admin
```

Mỗi app là một dự án Laravel đầy đủ (có `artisan`, `composer.json`, `routes`, `app`, ...).

---

## 4) Cấu hình database (khuyên dùng)

- Tạo 2 database riêng biệt (bằng phpMyAdmin hoặc để Laravel tự tạo khi migrate):

  - `eshopper_db` (dùng cho app eshopper)
  - `webhuy_db` (dùng cho app webhuy)

- Cập nhật `.env` của từng app:

`webbanhang-laravel/eshopper/.env`

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=eshopper_db
DB_USERNAME=root
DB_PASSWORD=
```

`webbanhang-laravel/webhuy/.env`

```
APP_URL=http://localhost:8001
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=webhuy_db
DB_USERNAME=root
DB_PASSWORD=
```

Ghi chú: Nếu đổi port Apache, truy cập phpMyAdmin bằng đúng port (ví dụ `http://localhost:8888/phpmyadmin`).

---

## 5) Hướng dẫn cài đặt & chạy

Bạn có thể chạy 2 app ở 2 terminal PowerShell khác nhau.

### 5.1) Chạy app eshopper (frontend)

```powershell
cd d:\code_laravel_php\webbanhang-laravel\eshopper

# Cài PHP dependencies
composer install

# Tạo file môi trường
copy .env.example .env

# (Sửa DB_* nếu cần theo mục 4), rồi sinh APP_KEY
php artisan key:generate

# Chạy migration (Laravel sẽ hỏi tạo DB nếu chưa có)
php artisan migrate

# Cài frontend dependencies (nếu dùng Vite/JS)
npm install
npm run dev

# Chạy server Laravel (gợi ý port 8000)
php artisan serve --port=8000
```

Mở trình duyệt: http://localhost:8000

### 5.2) Chạy app webhuy (admin)

```powershell
cd d:\code_laravel_php\webbanhang-laravel\webhuy

composer install
copy .env.example .env

# Cập nhật .env theo mục 4, sau đó
php artisan key:generate

# Chạy migration (Laravel sẽ hỏi tạo DB nếu chưa có)
php artisan migrate

# (Tuỳ chọn) Seed tài khoản admin mặc định
php artisan db:seed --class="Database\Seeders\AdminUserSeeder"

# Chạy server Laravel (gợi ý port 8001)
php artisan serve --port=8001
```

Mở trình duyệt: http://localhost:8001/admin

Tài khoản admin mặc định (nếu đã seed):

- Email: `admin@example.com`
- Mật khẩu: `admin123`

---

## 6) Một số ghi chú kỹ thuật

- Eloquent Soft Deletes: Nhiều model dùng `SoftDeletes` (ví dụ `Slider`). Hãy đảm bảo các bảng tương ứng có cột `deleted_at`. Nếu gặp lỗi kiểu `Unknown column sliders.deleted_at`, chỉ cần chạy `php artisan migrate` (đã có migration thêm cột này).
- Nếu cần reset DB khi migrations lệch phiên bản:
  ```powershell
  php artisan migrate:fresh
  ```
  Lưu ý: lệnh này xoá toàn bộ dữ liệu trong DB hiện tại.
- Nếu gặp lỗi kết nối MySQL (HY000/2002):
  - Kiểm tra MySQL đã chạy trong XAMPP.
  - Kiểm tra `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` trong `.env`.
  - Dùng đúng phpMyAdmin theo cổng Apache: `http://localhost/phpmyadmin` hoặc `http://localhost:8888/phpmyadmin`.

---

## 7) Chạy song song 2 ứng dụng

- Mở 2 cửa sổ PowerShell riêng:
  - Cửa sổ 1: chạy eshopper ở port 8000.
  - Cửa sổ 2: chạy webhuy ở port 8001.

Khi đó, người dùng cuối có thể duyệt mua hàng ở eshopper, còn admin đăng nhập vào webhuy để quản lý.

---

## 8) Troubleshooting nhanh

- `Could not open input file: artisan`: Bạn đang chạy lệnh sai thư mục. Hãy `cd` vào đúng thư mục app có file `artisan` trước khi chạy.
- 404/Asset không tải: Chạy `npm run dev` (hoặc build) và đảm bảo đường dẫn `asset()` trong blade đúng với thư mục `public`.
- Lỗi cổng trùng: Đổi port khi chạy `php artisan serve` bằng `--port=XXXX`.

---

## 9) Liên hệ / Góp ý

Nếu cần mình hỗ trợ seed dữ liệu mẫu (categories, sản phẩm, slider) để demo đầy đủ, hãy tạo issue hoặc liên hệ trực tiếp. Rất sẵn lòng hỗ trợ!
# ubiquitous-telegram
