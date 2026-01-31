<?php
namespace App\Controllers;

use App\Models\Student;

class StudentController
{
    private $studentModel;

    public function __construct()
    {
        $this->studentModel = new Student();
    }

    /**
     * Hiển thị danh sách sinh viên
     */
    public function index()
    {
        $students = $this->studentModel->all();
        include 'views/student_list.php';
    }

    /**
     * Hiển thị form thêm sinh viên
     */
    public function create()
    {
        require_once 'views/student_add.php';
    }

    /**
     * Xử lý thêm sinh viên mới
     */
    public function store()
    {
        // Validate
        $errors = [];

        if (empty($_POST['name'])) {
            $errors[] = "Tên sinh viên không được để trống";
        }

        if (!empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Email không hợp lệ";
        }

        // Nếu có lỗi
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['old'] = $_POST;
            header("Location: index.php?page=student-add");
            exit();
        }

        // Lưu dữ liệu
        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'] ?? '',
            'phone' => $_POST['phone'] ?? '',
            'address' => $_POST['address'] ?? ''
        ];

        if ($this->studentModel->insert($data)) {
            $_SESSION['success'] = "Thêm sinh viên thành công!";
        } else {
            $_SESSION['error'] = "Thêm sinh viên thất bại!";
        }

        header("Location: index.php?page=students");
        exit();
    }

    /**
     * Hiển thị chi tiết sinh viên
     */
    public function detail()
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            header("Location: index.php?page=students");
            exit();
        }

        $student = $this->studentModel->findById($id);

        if (!$student) {
            $_SESSION['error'] = "Không tìm thấy sinh viên!";
            header("Location: index.php?page=students");
            exit();
        }

        require_once 'views/student_detail.php';
    }

    /**
     * Hiển thị form chỉnh sửa
     */
    public function edit()
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            header("Location: index.php?page=students");
            exit();
        }

        $student = $this->studentModel->findById($id);

        if (!$student) {
            $_SESSION['error'] = "Không tìm thấy sinh viên!";
            header("Location: index.php?page=students");
            exit();
        }

        require_once 'views/student_edit.php';
    }

    /**
     * Xử lý cập nhật sinh viên
     */
    public function update()
    {
        $id = $_POST['id'] ?? null;

        if (!$id) {
            header("Location: index.php?page=students");
            exit();
        }

        // Validate
        $errors = [];

        if (empty($_POST['name'])) {
            $errors[] = "Tên sinh viên không được để trống";
        }

        if (!empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Email không hợp lệ";
        }

        // Nếu có lỗi
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['old'] = $_POST;
            header("Location: index.php?page=student-edit&id=" . $id);
            exit();
        }

        // Cập nhật
        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'] ?? '',
            'phone' => $_POST['phone'] ?? '',
            'address' => $_POST['address'] ?? ''
        ];

        if ($this->studentModel->update($id, $data)) {
            $_SESSION['success'] = "Cập nhật sinh viên thành công!";
        } else {
            $_SESSION['error'] = "Cập nhật sinh viên thất bại!";
        }

        header("Location: index.php?page=students");
        exit();
    }

    /**
     * Xóa sinh viên
     */
    public function delete()
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            header("Location: index.php?page=students");
            exit();
        }

        if ($this->studentModel->delete($id)) {
            $_SESSION['success'] = "Xóa sinh viên thành công!";
        } else {
            $_SESSION['error'] = "Xóa sinh viên thất bại!";
        }

        header("Location: index.php?page=students");
        exit();
    }
}
