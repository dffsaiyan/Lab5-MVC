<?php
namespace App\Models;

use PDO;

class Product extends BaseModel {

    /**
     * Lấy tất cả sản phẩm
     */
    public function all() {
        $sql = "SELECT * FROM products ORDER BY id DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Tìm sản phẩm theo ID
     */
    public function findById($id) {
        $sql = "SELECT * FROM products WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Thêm sản phẩm mới
     */
    public function insert($data) {
        $sql = "INSERT INTO products (name, price, description, image) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $data['name'],
            $data['price'],
            $data['description'] ?? '',
            $data['image'] ?? ''
        ]);
    }

    /**
     * Cập nhật sản phẩm
     */
    public function update($id, $data) {
        $sql = "UPDATE products SET name = ?, price = ?, description = ?, image = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $data['name'],
            $data['price'],
            $data['description'] ?? '',
            $data['image'] ?? '',
            $id
        ]);
    }

    /**
     * Xóa sản phẩm
     */
    public function delete($id) {
        $sql = "DELETE FROM products WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }

    /**
     * Tìm kiếm sản phẩm theo tên
     */
    public function search($keyword) {
        $sql = "SELECT * FROM products WHERE name LIKE ? ORDER BY id DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['%' . $keyword . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
