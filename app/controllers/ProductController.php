<?php
namespace App\Controllers;

use App\Models\Product;

class ProductController
{
     private $productModel;

     public function __construct()
     {
          $this->productModel = new Product();
     }

     /**
      * Hiển thị danh sách sản phẩm
      */
     public function index()
     {
          $keyword = $_GET['search'] ?? '';

          if ($keyword) {
               $products = $this->productModel->search($keyword);
          } else {
               $products = $this->productModel->all();
          }

          require_once 'views/product-list.php';
     }

     /**
      * Hiển thị form thêm sản phẩm mới
      */
     public function create()
     {
          require_once 'views/product-add.php';
     }

     /**
      * Xử lý lưu sản phẩm mới
      */
     public function store()
     {
          // Validate dữ liệu
          $errors = [];

          if (empty($_POST['name'])) {
               $errors[] = "Tên sản phẩm không được để trống";
          }

          if (empty($_POST['price'])) {
               $errors[] = "Giá sản phẩm không được để trống";
          } elseif (!is_numeric($_POST['price']) || $_POST['price'] <= 0) {
               $errors[] = "Giá sản phẩm phải là số dương";
          }

          // Nếu có lỗi, quay lại form
          if (!empty($errors)) {
               $_SESSION['errors'] = $errors;
               $_SESSION['old'] = $_POST;
               header("Location: index.php?page=product-add");
               exit();
          }

          // Lưu dữ liệu
          $data = [
               'name' => $_POST['name'],
               'price' => $_POST['price'],
               'description' => $_POST['description'] ?? '',
               'image' => $_POST['image'] ?? ''
          ];

          if ($this->productModel->insert($data)) {
               $_SESSION['success'] = "Thêm sản phẩm thành công!";
          } else {
               $_SESSION['error'] = "Thêm sản phẩm thất bại!";
          }

          header("Location: index.php?page=product-list");
          exit();
     }

     /**
      * Hiển thị chi tiết sản phẩm
      */
     public function detail()
     {
          $id = $_GET['id'] ?? null;

          if (!$id) {
               header("Location: index.php?page=product-list");
               exit();
          }

          $product = $this->productModel->findById($id);

          if (!$product) {
               $_SESSION['error'] = "Không tìm thấy sản phẩm!";
               header("Location: index.php?page=product-list");
               exit();
          }

          require_once 'views/product-detail.php';
     }

     /**
      * Hiển thị form chỉnh sửa sản phẩm
      */
     public function edit()
     {
          $id = $_GET['id'] ?? null;

          if (!$id) {
               header("Location: index.php?page=product-list");
               exit();
          }

          $product = $this->productModel->findById($id);

          if (!$product) {
               $_SESSION['error'] = "Không tìm thấy sản phẩm!";
               header("Location: index.php?page=product-list");
               exit();
          }

          require_once 'views/product-edit.php';
     }

     /**
      * Xử lý cập nhật sản phẩm
      */
     public function update()
     {
          $id = $_POST['id'] ?? null;

          if (!$id) {
               header("Location: index.php?page=product-list");
               exit();
          }

          // Validate dữ liệu
          $errors = [];

          if (empty($_POST['name'])) {
               $errors[] = "Tên sản phẩm không được để trống";
          }

          if (empty($_POST['price'])) {
               $errors[] = "Giá sản phẩm không được để trống";
          } elseif (!is_numeric($_POST['price']) || $_POST['price'] <= 0) {
               $errors[] = "Giá sản phẩm phải là số dương";
          }

          // Nếu có lỗi, quay lại form
          if (!empty($errors)) {
               $_SESSION['errors'] = $errors;
               $_SESSION['old'] = $_POST;
               header("Location: index.php?page=product-edit&id=" . $id);
               exit();
          }

          // Cập nhật dữ liệu
          $data = [
               'name' => $_POST['name'],
               'price' => $_POST['price'],
               'description' => $_POST['description'] ?? '',
               'image' => $_POST['image'] ?? ''
          ];

          if ($this->productModel->update($id, $data)) {
               $_SESSION['success'] = "Cập nhật sản phẩm thành công!";
          } else {
               $_SESSION['error'] = "Cập nhật sản phẩm thất bại!";
          }

          header("Location: index.php?page=product-list");
          exit();
     }

     /**
      * Xóa sản phẩm
      */
     public function delete()
     {
          $id = $_GET['id'] ?? null;

          if (!$id) {
               header("Location: index.php?page=product-list");
               exit();
          }

          if ($this->productModel->delete($id)) {
               $_SESSION['success'] = "Xóa sản phẩm thành công!";
          } else {
               $_SESSION['error'] = "Xóa sản phẩm thất bại!";
          }

          header("Location: index.php?page=product-list");
          exit();
     }
}
