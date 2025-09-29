# Khắc Phục Lỗi 419 CSRF Token - Laravel

## 🚨 Lỗi 419 Page Expired (CSRF Token)

Lỗi 419 thường xảy ra khi:

- CSRF token hết hạn
- Thiếu CSRF token trong form
- Session không hoạt động đúng cách
- Cookie bị block

## 🔧 Các Cách Khắc Phục

### 1. **Kiểm tra Form có CSRF Token**

Đảm bảo form login có `@csrf` directive:

```html
<!-- Form login -->
<form method="POST" action="{{ route('login') }}">
  @csrf
  <input type="email" name="email" required />
  <input type="password" name="password" required />
  <button type="submit">Đăng nhập</button>
</form>
```

### 2. **Kiểm tra Session Configuration**

File `config/session.php`:

```php
'driver' => 'file',
'lifetime' => 120,
'expire_on_close' => false,
'encrypt' => false,
'files' => storage_path('framework/sessions'),
'connection' => null,
'table' => 'sessions',
'store' => null,
'lottery' => [2, 100],
'cookie' => env('SESSION_COOKIE', 'laravel_session'),
'path' => '/',
'domain' => env('SESSION_DOMAIN', null),
'secure' => env('SESSION_SECURE_COOKIE', false),
'http_only' => true,
'same_site' => 'lax',
```

### 3. **Kiểm tra .env File**

Đảm bảo có các dòng sau trong `.env`:

```bash
APP_KEY=base64:your-app-key-here
APP_URL=http://localhost:8000
SESSION_DRIVER=file
SESSION_LIFETIME=120
```

### 4. **Clear Cache và Session**

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan cache:clear
php artisan session:table  # nếu dùng database session
php artisan migrate        # chạy migration session table
```

### 5. **Tạo Storage Link**

```bash
php artisan storage:link
```

### 6. **Kiểm tra Permissions**

```bash
# Windows
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/

# hoặc
icacls storage /grant Everyone:F /T
icacls bootstrap/cache /grant Everyone:F /T
```

### 7. **Regenerate APP_KEY**

```bash
php artisan key:generate
```

### 8. **Kiểm tra Middleware**

File `app/Http/Kernel.php` - đảm bảo có:

```php
protected $middlewareGroups = [
    'web' => [
        \App\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\Session\Middleware\AuthenticateSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \App\Http\Middleware\VerifyCsrfToken::class,
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
    ],
];
```

### 9. **Disable CSRF cho Testing (Tạm thời)**

File `app/Http/Middleware/VerifyCsrfToken.php`:

```php
protected $except = [
    'login',  // tạm thời disable CSRF cho route login
    'admin/login',
];
```

**⚠️ Lưu ý: Chỉ dùng cho testing, không dùng trên production!**

### 10. **Kiểm tra Browser**

- Xóa cookies của localhost
- Disable ad blockers
- Thử incognito/private mode
- Clear browser cache

---

## 🎯 **Tài Khoản Admin Cập Nhật**

### **WebHuy Admin:**

- **Email**: `admin@example.com`
- **Password**: `admin123`

**HOẶC**

- **Email**: `superadmin@webhuy.com`
- **Password**: `admin123`

- **Email**: `manager@webhuy.com`
- **Password**: `manager123`

---

## 🐛 **Debug Steps**

1. **Kiểm tra Laravel Log:**

```bash
tail -f storage/logs/laravel.log
```

2. **Enable Debug Mode:**

```bash
# .env
APP_DEBUG=true
```

3. **Kiểm tra Network Tab trong DevTools:**

   - Xem request có gửi `_token` không
   - Kiểm tra response headers
   - Xem cookies có được set không

4. **Kiểm tra Session:**

```php
// Thêm vào route test
Route::get('/test-session', function() {
    dd(session()->all(), csrf_token());
});
```

---

## 📋 **Checklist Khắc Phục**

- [ ] Form có `@csrf`
- [ ] APP_KEY được generate
- [ ] Storage permissions đúng
- [ ] Cache được clear
- [ ] Browser cookies được clear
- [ ] Middleware đầy đủ
- [ ] Session config đúng

---

**💡 Tip:** Nếu vẫn lỗi, hãy tạo route test đơn giản để debug:

```php
Route::get('/login-test', function() {
    return view('login-test');
});

Route::post('/login-test', function() {
    return 'Login thành công!';
})->name('login.test');
```

```html
<!-- resources/views/login-test.blade.php -->
<form method="POST" action="{{ route('login.test') }}">
  @csrf
  <input type="email" name="email" value="admin@example.com" />
  <input type="password" name="password" value="admin123" />
  <button type="submit">Test Login</button>
</form>
```
