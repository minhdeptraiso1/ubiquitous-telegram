# HƯỚNG DẪN SỬ DỤNG CHỨC NĂNG IMPORT/EXPORT USER

## 📋 Tổng quan
Chức năng Import/Export cho phép:
- **Import users** từ file text (.txt) 
- **Export dữ liệu user** hiện tại ra file text
- **Download file mẫu** để tham khảo format import

## 🔗 Routes đã được định nghĩa

```php
// File Import/Export Routes  
Route::post('/import-users', [FileImportController::class, 'importUsers'])->name('import.users');
Route::get('/export-user-data', [FileImportController::class, 'exportUserData'])->name('export.user.data')->middleware('auth');
Route::get('/download-sample-file', [FileImportController::class, 'downloadSampleFile'])->name('download.sample.file');
```

## 📁 Format file import

### Cấu trúc file .txt:
```
name=Nguyen Van A
email=nguyenvana@example.com
password=123456
phone=0123456789
address=123 ABC Street, XYZ City
---
name=Tran Thi B
email=tranthib@example.com
password=abcdef
phone=0987654321
address=456 DEF Street, UVW City
---
```

### Quy tắc:
- **Bắt buộc:** `name`, `email`, `password`
- **Tùy chọn:** `phone`, `address`
- **Phân cách:** Dùng `---` để phân cách giữa các user
- **Format:** `key=value` trên mỗi dòng

## 🎯 Chức năng Import Users

### Xử lý:
1. **Validate file:** Chỉ chấp nhận .txt, tối đa 2MB
2. **Parse dữ liệu:** Tách từng user block bằng `---`
3. **Kiểm tra trùng lặp:** Email không được trùng
4. **Tạo User:** Hash password và tạo trong bảng `users`
5. **Tạo Customer:** Tạo profile trong bảng `customers` nếu có phone/address

### Kết quả:
- **Thành công:** Thông báo số user đã import
- **Lỗi:** Danh sách các lỗi gặp phải

## 📤 Chức năng Export User Data

### Thông tin được export:
- **User info:** Name, Email, Phone, Address
- **Account info:** Created date, Export date  
- **Order statistics:** Total orders, Total spent
- **Order history:** Danh sách đơn hàng chi tiết
- **Import format:** Mẫu để tham khảo

### File output:
- **Format:** `.txt`
- **Tên file:** `user_data_{user_id}_{timestamp}.txt`

## 🔧 Các lỗi thường gặp và cách sửa

### 1. **Lỗi Upload File**
```
The import file field is required.
The import file must be a file of type: txt.
```
**Nguyên nhân:** File không đúng định dạng hoặc quá lớn
**Cách sửa:** 
- Chỉ upload file .txt
- File tối đa 2MB

### 2. **Lỗi Format Dữ liệu**
```
No users imported. Error creating user...
```
**Nguyên nhân:** Format trong file không đúng
**Cách sửa:**
- Đảm bảo có `name=`, `email=`, `password=`
- Dùng `---` để phân cách user
- Không có dòng trống thừa

### 3. **Lỗi Trùng Email**
```
User with email abc@example.com already exists
```
**Nguyên nhân:** Email đã tồn tại trong database
**Cách sửa:** 
- Thay đổi email trong file import
- Hoặc xóa user cũ trước khi import

### 4. **Lỗi Database**
```
Error creating user: SQLSTATE[23000]...
```
**Nguyên nhân:** Lỗi constraint database
**Cách sửa:**
- Kiểm tra email format hợp lệ
- Đảm bảo name không quá dài (255 chars)
- Password không được để trống

## 🎨 Tạo Form Upload (nếu chưa có)

### HTML Form:
```html
<form action="{{ route('import.users') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Import Users File (.txt)</label>
        <input type="file" name="import_file" class="form-control" accept=".txt" required>
        <small class="text-muted">File format: name=value, separated by ---</small>
    </div>
    <button type="submit" class="btn btn-primary">Import Users</button>
    <a href="{{ route('download.sample.file') }}" class="btn btn-info">Download Sample</a>
</form>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
```

## 🔍 Debug và Test

### Test Import:
1. Tạo file `test_users.txt` với format đúng
2. Upload qua form
3. Kiểm tra database xem user đã được tạo chưa
4. Kiểm tra thông báo success/error

### Test Export:
1. Đăng nhập với user có đơn hàng
2. Click "Export Data" trong header
3. Kiểm tra file download có đúng thông tin không

### Debug Log:
```php
// Thêm vào FileImportController để debug
Log::info('Import attempt', ['file_size' => $file->getSize(), 'mime' => $file->getMimeType()]);
Log::info('Parsed user data', $userData);
```

## 📱 Tích hợp vào Header

Header đã có link Export:
```php
@if(Auth::check())
<li><a href="{{ route('export.user.data') }}"><i class="fa fa-download"></i> Export Data</a></li>
@endif
```

Có thể thêm link Import cho admin:
```php
@if(Auth::check() && Auth::user()->is_admin)
<li><a href="#import-modal" data-toggle="modal"><i class="fa fa-upload"></i> Import Users</a></li>
@endif
```

## ⚠️ Lưu ý bảo mật

1. **Validation:** Luôn validate file input
2. **Authorization:** Chỉ admin mới được import
3. **Sanitize:** Clean dữ liệu trước khi lưu database
4. **Log:** Ghi log mọi thao tác import/export
5. **Backup:** Backup database trước khi import số lượng lớn

---
**Ngày tạo:** 30/09/2025  
**Controller:** `FileImportController.php`  
**Routes:** `import.users`, `export.user.data`, `download.sample.file`