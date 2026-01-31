<?php
session_start();

require 'vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\StudentController;
use App\Controllers\ProductController;

$page = $_GET['page'] ?? 'home';

$studentController = new StudentController();
$productController = new ProductController();

if ($page === 'home') {
    (new HomeController())->index();

    // ========== Student Routes ==========
} elseif ($page === 'students') {
    $studentController->index();

} elseif ($page === 'student-delete') {
    $studentController->delete();

} elseif ($page === 'student-detail') {
    $studentController->detail();

} elseif ($page === 'student-add') {
    $studentController->create();

} elseif ($page === 'student-store') {
    $studentController->store();

} elseif ($page === 'student-edit') {
    $studentController->edit();

} elseif ($page === 'student-update') {
    $studentController->update();

    // ========== Product Routes ==========
} elseif ($page === 'product-list') {
    $productController->index();

} elseif ($page === 'product-add') {
    $productController->create();

} elseif ($page === 'product-store') {
    $productController->store();

} elseif ($page === 'product-detail') {
    $productController->detail();

} elseif ($page === 'product-edit') {
    $productController->edit();

} elseif ($page === 'product-update') {
    $productController->update();

} elseif ($page === 'product-delete') {
    $productController->delete();

} else {
    echo "404 - Page Not Found";
}
