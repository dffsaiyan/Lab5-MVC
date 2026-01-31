-- ============================================
-- FIX BẢNG STUDENTS
-- Chạy file này trong phpMyAdmin để sửa lỗi
-- ============================================

-- Bước 1: XÓA bảng students cũ (nếu có)
DROP TABLE IF EXISTS students;

-- Bước 2: TẠO LẠI bảng students với cấu trúc đúng
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255),
    phone VARCHAR(20),
    address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Bước 3: THÊM dữ liệu mẫu
INSERT INTO students (name, email, phone, address) VALUES
('Nguyễn Văn An', 'nguyenvanan@gmail.com', '0912345678', 'Số 1 Đại Cồ Việt, Hai Bà Trưng, Hà Nội'),
('Trần Thị Bình', 'tranthibinh@gmail.com', '0987654321', 'Số 96 Định Công, Hoàng Mai, Hà Nội'),
('Lê Hoàng Cường', 'lehoangcuong@gmail.com', '0901234567', 'Số 144 Xuân Thủy, Cầu Giấy, Hà Nội'),
('Phạm Thị Dung', 'phamthidung@gmail.com', '0923456789', 'Số 54 Nguyễn Chí Thanh, Đống Đa, Hà Nội'),
('Hoàng Văn Em', 'hoangvanem@gmail.com', '0934567890', 'Số 218 Lĩnh Nam, Hoàng Mai, Hà Nội');

-- XONG! Kiểm tra bằng query: SELECT * FROM students;
