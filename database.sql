-- ============================================
-- BẢNG PRODUCTS (SẢN PHẨM)
-- ============================================

-- Tạo bảng products nếu chưa tồn tại
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    description TEXT,
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Thêm dữ liệu mẫu products
INSERT INTO products (name, price, description, image) VALUES
('iPhone 15 Pro Max', 29990000, 'Điện thoại cao cấp từ Apple với chip A17 Pro, camera 48MP, màn hình Super Retina XDR 6.7 inch, khung titan bền bỉ', 'https://cdn.tgdd.vn/Products/Images/42/305658/iphone-15-pro-max-blue-thumbnew-200x200.jpg'),
('Samsung Galaxy S24 Ultra', 24990000, 'Flagship Android mới nhất từ Samsung với Snapdragon 8 Gen 3, bút S Pen, camera zoom 100x, màn hình Dynamic AMOLED 2X', 'https://cdn.tgdd.vn/Products/Images/42/320721/samsung-galaxy-s24-ultra-grey-thumbnew-200x200.jpg'),
('MacBook Pro M3 14 inch', 54990000, 'Laptop chuyên nghiệp với chip M3 mạnh mẽ, màn hình Liquid Retina XDR, 8GB RAM, SSD 512GB, pin 22 giờ', 'https://cdn.tgdd.vn/Products/Images/44/309016/macbook-pro-14-inch-m3-2023-space-gray-thumbnew-200x200.jpg'),
('iPad Air 6 M2 11 inch', 16990000, 'Máy tính bảng đa năng từ Apple với chip M2, màn hình Liquid Retina 11 inch, hỗ trợ Apple Pencil Pro', 'https://cdn.tgdd.vn/Products/Images/522/325536/ipad-air-6-m2-11-inch-wifi-blue-thumb-200x200.jpg'),
('AirPods Pro 2 (USB-C)', 6990000, 'Tai nghe không dây cao cấp với chống ồn chủ động, âm thanh Adaptive Audio, sạc không dây MagSafe', 'https://cdn.tgdd.vn/Products/Images/54/289780/airpods-pro-2nd-gen-usb-c-thumb-200x200.jpg'),
('Apple Watch Series 9', 10990000, 'Đồng hồ thông minh với chip S9, màn hình Always-On Retina, theo dõi sức khỏe toàn diện, chống nước', 'https://cdn.tgdd.vn/Products/Images/7077/309733/apple-watch-s9-lte-41mm-vien-nhom-day-cao-su-thumb-200x200.jpg'),
('Sony WH-1000XM5', 8990000, 'Tai nghe chụp tai cao cấp với chống ồn tốt nhất, âm thanh Hi-Res, pin 30 giờ, kết nối đa điểm', 'https://cdn.tgdd.vn/Products/Images/54/285071/sony-wh-1000xm5-den-thumb-200x200.jpg'),
('Xiaomi 14 Ultra', 19990000, 'Smartphone camera chuyên nghiệp với cảm biến 1 inch, ống kính Leica, Snapdragon 8 Gen 3, sạc nhanh 90W', 'https://cdn.tgdd.vn/Products/Images/42/320916/xiaomi-14-ultra-black-thumb-200x200.jpg'),
('Dell XPS 13 Plus', 42990000, 'Laptop mỏng nhẹ cao cấp Intel Core i7-12700H, RAM 16GB, SSD 512GB, màn hình 13.4 inch OLED cảm ứng', 'https://cdn.tgdd.vn/Products/Images/44/306130/dell-xps-13-plus-9320-i7-71006512w-thumb-200x200.jpg'),
('Samsung Galaxy Tab S9', 18990000, 'Máy tính bảng Android cao cấp với Snapdragon 8 Gen 2, màn hình Dynamic AMOLED 2X 11 inch, bút S Pen', 'https://cdn.tgdd.vn/Products/Images/522/309816/samsung-galaxy-tab-s9-5g-grey-thumb-200x200.jpg');

-- ============================================
-- BẢNG STUDENTS (SINH VIÊN)
-- ============================================

-- Tạo bảng students nếu chưa tồn tại
CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255),
    phone VARCHAR(20),
    address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Thêm dữ liệu mẫu students
INSERT INTO students (name, email, phone, address) VALUES
('Nguyễn Văn An', 'nguyenvanan@gmail.com', '0912345678', 'Số 1 Đại Cồ Việt, Hai Bà Trưng, Hà Nội'),
('Trần Thị Bình', 'tranthibinh@gmail.com', '0987654321', 'Số 96 Định Công, Hoàng Mai, Hà Nội'),
('Lê Hoàng Cường', 'lehoangcuong@gmail.com', '0901234567', 'Số 144 Xuân Thủy, Cầu Giấy, Hà Nội'),
('Phạm Thị Dung', 'phamthidung@gmail.com', '0923456789', 'Số 54 Nguyễn Chí Thanh, Đống Đa, Hà Nội'),
('Hoàng Văn Em', 'hoangvanem@gmail.com', '0934567890', 'Số 218 Lĩnh Nam, Hoàng Mai, Hà Nội');

