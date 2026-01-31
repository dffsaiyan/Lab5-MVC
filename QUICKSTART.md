# 🚀 QUICK START - 5 Phút Setup

## Bước 1: Khởi động XAMPP (30 giây)
1. Mở **XAMPP Control Panel**
2. Click **Start** cho **Apache**
3. Click **Start** cho **MySQL**
4. Đợi đến khi status chuyển sang màu xanh

## Bước 2: Tạo/Chọn Database (1 phút)
1. Mở trình duyệt: **http://localhost/phpmyadmin**
2. Nếu đã có database **`lab5mvc`** → Click vào
3. Nếu chưa có:
   - Click **New** ở sidebar trái
   - Tên database: `lab5mvc`
   - Click **Create**

## Bước 3: Import Dữ liệu (2 phút)

### 3A. Import Products:
1. Click vào database `lab5mvc`
2. Click tab **SQL**
3. Mở file **`database.sql`** trong VS Code
4. **Ctrl + A** → **Ctrl + C** (copy tất cả)
5. Paste vào phpMyAdmin → Click **Go**
6. ✅ Thấy "10 rows inserted"

### 3B. Import Students:
1. Vẫn ở tab **SQL**
2. Mở file **`fix_students_table.sql`** trong VS Code
3. **Ctrl + A** → **Ctrl + C**
4. Paste vào phpMyAdmin → Click **Go**
5. ✅ Thấy "5 rows inserted"

## Bước 4: Kiểm tra (30 giây)
Chạy 2 query này:
```sql
SELECT * FROM products;
SELECT * FROM students;
```
- ✅ 10 sản phẩm với hình ảnh
- ✅ 5 sinh viên

## Bước 5: Chạy Website (10 giây)
```
http://localhost/Lab5_MVC
```

## 🎉 XONG!

Sẽ thấy trang chủ với 2 module:
- 🛍️ **Quản lý Sản phẩm** (10 products)
- 👥 **Quản lý Sinh viên** (5 students)

---

## ⚡ Test Nhanh:

### Products:
1. ✅ Xem danh sách 10 sản phẩm
2. ✅ Tìm kiếm "iPhone"
3. ✅ Thêm/Sửa/Xóa/Chi tiết

### Students:
1. ✅ Xem danh sách 5 sinh viên
2. ✅ Thêm/Sửa/Xóa/Chi tiết

---

## ❗ Nếu gặp lỗi:

### "Cannot connect to database"
➡️ MySQL chưa start trong XAMPP

### "Table not found"
➡️ Import lại `database.sql` và `fix_students_table.sql`

### "Column not found: name"
➡️ Chạy file `fix_students_table.sql` trong phpMyAdmin

### "Class not found"
➡️ Chạy: `composer install`

---

## 📝 Thông tin Database:

| Cấu hình | Giá trị |
|----------|---------|
| **Database** | lab5mvc |
| **Host** | localhost |
| **User** | root |
| **Password** | (trống) |

---

## 📚 Đọc thêm:
- **README.md** - Tài liệu đầy đủ, chi tiết

---

✅ **Sẵn sàng demo và nộp bài!**
