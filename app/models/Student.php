<?php
namespace App\Models;

use PDO;

class Student extends BaseModel
{

    /**
     * Lấy tất cả sinh viên
     */
    public function all()
    {
        $sql = "SELECT * FROM students ORDER BY id DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Tìm sinh viên theo ID
     */
    public function findById($id)
    {
        $sql = "SELECT * FROM students WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Thêm sinh viên mới
     */
    public function insert($data)
    {
        $sql = "INSERT INTO students (name, email, phone, address) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $data['name'],
            $data['email'] ?? '',
            $data['phone'] ?? '',
            $data['address'] ?? ''
        ]);
    }

    /**
     * Cập nhật sinh viên
     */
    public function update($id, $data)
    {
        $sql = "UPDATE students SET name = ?, email = ?, phone = ?, address = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $data['name'],
            $data['email'] ?? '',
            $data['phone'] ?? '',
            $data['address'] ?? '',
            $id
        ]);
    }

    /**
     * Xóa sinh viên
     */
    public function delete($id)
    {
        $sql = "DELETE FROM students WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }
}
