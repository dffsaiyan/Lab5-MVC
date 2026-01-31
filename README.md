# Lab 5 - MVC Management System

Hệ thống quản lý Sinh viên & Sản phẩm sử dụng mô hình MVC (Model-View-Controller) với PHP và Bootstrap 5.

## 📋 Yêu cầu hệ thống

- XAMPP (PHP 7.4+, MySQL)
- Composer
- Trình duyệt web hiện đại

## 🚀 Cài đặt

### Bước 1: Import Database

1. Mở phpMyAdmin (http://localhost/phpmyadmin)
2. Tạo database mới tên `buoi2_php` (hoặc sử dụng database đã có)
3. Import file `database.sql` hoặc chạy các câu lệnh SQL sau:

```sql
-- Tạo bảng products
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    description TEXT,
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Thêm dữ liệu mẫu
INSERT INTO products (name, price, description, image) VALUES
('iPhone 15 Pro', 29990000, 'Điện thoại cao cấp từ Apple với chip A17 Pro', 'https://cdn.tgdd.vn/Products/Images/42/305658/iphone-15-pro-max-blue-thumbnew-200x200.jpg'),
('Samsung Galaxy S24', 24990000, 'Flagship Android mới nhất từ Samsung', 'https://cdn.tgdd.vn/Products/Images/42/320721/samsung-galaxy-s24-ultra-grey-thumbnew-200x200.jpg'),
('MacBook Pro M3', 54990000, 'Laptop chuyên nghiệp với chip M3 mạnh mẽ', 'https://cdn.tgdd.vn/Products/Images/44/309016/macbook-pro-14-inch-m3-2023-space-gray-thumbnew-200x200.jpg'),
('iPad Air', 16990000, 'Máy tính bảng đa năng từ Apple', 'https://cdn.tgdd.vn/Products/Images/522/325536/ipad-air-6-m2-11-inch-wifi-blue-thumb-200x200.jpg'),
('AirPods Pro', 6990000, 'Tai nghe không dây cao cấp với chống ồn', 'https://cdn.tgdd.vn/Products/Images/54/289780/airpods-pro-2nd-gen-usb-c-thumb-200x200.jpg');
```

### Bước 2: Cấu hình Database

Mở file `app/models/BaseModel.php` và kiểm tra thông tin kết nối:

```php
$this->pdo = new PDO(
    "mysql:host=localhost;dbname=buoi2_php;charset=utf8",
    "root",
    ""
);
```

### Bước 3: Cài đặt Dependencies

Mở terminal tại thư mục project và chạy:

```bash
composer install
```

### Bước 4: Khởi động XAMPP

1. Mở XAMPP Control Panel
2. Start Apache
3. Start MySQL

### Bước 5: Truy cập ứng dụng

Mở trình duyệt và truy cập:
```
http://localhost/Lab5_MVC
```

## 📁 Cấu trúc thư mục

```
Lab5_MVC/
├── app/
│   ├── controllers/
│   │   ├── HomeController.php
│   │   ├── StudentController.php
│   │   └── ProductController.php
│   └── models/
│       ├── BaseModel.php
│       ├── Student.php
│       └── Product.php
├── views/
│   ├── home.php
│   ├── product-list.php
│   ├── product-add.php
│   ├── product-detail.php
│   └── product-edit.php
├── vendor/
├── composer.json
├── database.sql
├── index.php
└── README.md
```

## ✨ Tính năng

### Quản lý Sản phẩm (Product Management)

#### 1. Danh sách sản phẩm (List)
- URL: `index.php?page=product-list`
- Hiển thị tất cả sản phẩm dưới dạng bảng
- Các cột: ID, Hình ảnh, Tên, Giá, Hành động
- Tìm kiếm sản phẩm theo tên

#### 2. Thêm sản phẩm mới (Create)
- URL: `index.php?page=product-add`
- Form nhập liệu với các trường:
  - Tên sản phẩm (bắt buộc)
  - Giá (bắt buộc, số dương)
  - Mô tả (tùy chọn)
  - URL Hình ảnh (tùy chọn)
- Validation: Kiểm tra dữ liệu trống và giá trị hợp lệ
- Redirect về danh sách sau khi thêm thành công

#### 3. Chi tiết sản phẩm (Detail)
- URL: `index.php?page=product-detail&id={id}`
- Hiển thị đầy đủ thông tin sản phẩm
- Hiển thị hình ảnh lớn
- Hiển thị ngày tạo và cập nhật

#### 4. Chỉnh sửa sản phẩm (Update)
- URL: `index.php?page=product-edit&id={id}`
- Form được điền sẵn dữ liệu cũ
- Validation tương tự form thêm mới
- Hiển thị preview hình ảnh hiện tại
- Redirect về danh sách sau khi cập nhật thành công

#### 5. Xóa sản phẩm (Delete)
- URL: `index.php?page=product-delete&id={id}`
- Có xác nhận trước khi xóa (JavaScript confirm)
- Redirect về danh sách sau khi xóa thành công

#### 6. Tìm kiếm sản phẩm (Search)
- Tìm kiếm theo tên sản phẩm
- Hiển thị kết quả phù hợp
- Nút "Xóa" để quay lại danh sách đầy đủ

## 🎨 Giao diện

- Sử dụng Bootstrap 5 (CDN)
- Bootstrap Icons cho các icon
- Gradient background đẹp mắt
- Responsive design (tương thích mobile)
- Card design với shadow và border-radius
- Hover effects trên buttons và cards
- Alert messages cho thông báo (success/error)

## 🔧 Công nghệ sử dụng

- **Backend**: PHP 7.4+
- **Database**: MySQL with PDO
- **Frontend**: HTML5, CSS3, JavaScript
- **CSS Framework**: Bootstrap 5.3.0
- **Icons**: Bootstrap Icons 1.11.0
- **Pattern**: MVC (Model-View-Controller)
- **Security**: Prepared Statements (chống SQL Injection)

## 📚 Chi tiết kỹ thuật

### Model Layer
- `BaseModel.php`: Kết nối PDO, được kế thừa bởi các model khác
- `Product.php`: Các phương thức CRUD cho sản phẩm
  - `all()`: Lấy tất cả sản phẩm
  - `findById($id)`: Tìm sản phẩm theo ID
  - `insert($data)`: Thêm sản phẩm mới
  - `update($id, $data)`: Cập nhật sản phẩm
  - `delete($id)`: Xóa sản phẩm
  - `search($keyword)`: Tìm kiếm sản phẩm

### Controller Layer
- `ProductController.php`: Xử lý logic nghiệp vụ
  - `index()`: Hiển thị danh sách
  - `create()`: Hiển thị form thêm
  - `store()`: Xử lý lưu dữ liệu mới
  - `detail()`: Hiển thị chi tiết
  - `edit()`: Hiển thị form sửa
  - `update()`: Xử lý cập nhật
  - `delete()`: Xử lý xóa

### View Layer
- Views sử dụng Bootstrap 5 components
- Template với HTML5 semantic
- Responsive và mobile-friendly

### Router
- `index.php`: Front controller
- Query string routing (?page=...)
- Session management cho messages

## 🛡️ Bảo mật

- **Prepared Statements**: Chống SQL Injection
- **htmlspecialchars()**: Chống XSS attacks
- **Session**: Lưu trữ messages an toàn
- **Validation**: Kiểm tra dữ liệu đầu vào

## 📝 Lưu ý

1. Đảm bảo XAMPP đang chạy
2. Database đã được import
3. Đường dẫn URL hình ảnh phải chính xác
4. Có thể sử dụng URL từ internet hoặc đường dẫn local

## 🎯 Mở rộng

Các tính năng có thể thêm:
- Upload hình ảnh thay vì URL
- Phân trang (pagination)
- Sắp xếp (sorting)
- Filter theo giá
- Categories cho sản phẩm
- Authentication/Authorization

## 👨‍💻 Tác giả

- Developed for Lab 5 - MVC Challenge
- PHP MVC Pattern Implementation
- Bootstrap 5 Integration

## 📞 Hỗ trợ

Nếu gặp vấn đề, kiểm tra:
1. XAMPP có đang chạy không?
2. Database đã được tạo chưa?
3. Thông tin kết nối trong BaseModel.php có đúng không?
4. Composer dependencies đã được install chưa?

---

**Chúc bạn học tốt! 🚀**
