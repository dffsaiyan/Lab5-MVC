<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 5 - MVC Management System</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 50px 0;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            border: none;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .feature-icon {
            font-size: 4rem;
            margin-bottom: 20px;
        }

        .card-title {
            font-size: 1.8rem;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="card bg-white text-center">
                    <div class="card-body py-5">
                        <h1 class="display-3 fw-bold mb-3">
                            <i class="bi bi-gear-fill text-primary"></i>
                            Lab 5 - MVC Management System
                        </h1>
                        <p class="lead text-muted">Quản lý Sinh viên & Sản phẩm</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Features -->
        <div class="row g-4">
            <!-- Student Management -->
            <div class="col-md-6">
                <div class="card h-100 bg-white text-center">
                    <div class="card-body p-5">
                        <i class="bi bi-people-fill text-info feature-icon"></i>
                        <h2 class="card-title mb-3">Quản lý Sinh viên</h2>
                        <p class="card-text text-muted mb-4">
                            Thêm, sửa, xóa và xem danh sách sinh viên một cách dễ dàng
                        </p>
                        <a href="index.php?page=students" class="btn btn-info btn-lg px-5">
                            <i class="bi bi-arrow-right-circle"></i> Truy cập
                        </a>
                    </div>
                </div>
            </div>

            <!-- Product Management -->
            <div class="col-md-6">
                <div class="card h-100 bg-white text-center">
                    <div class="card-body p-5">
                        <i class="bi bi-bag-fill text-success feature-icon"></i>
                        <h2 class="card-title mb-3">Quản lý Sản phẩm</h2>
                        <p class="card-text text-muted mb-4">
                            Quản lý toàn bộ sản phẩm với đầy đủ chức năng CRUD
                        </p>
                        <a href="index.php?page=product-list" class="btn btn-success btn-lg px-5">
                            <i class="bi bi-arrow-right-circle"></i> Truy cập
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="card bg-dark text-white text-center">
                    <div class="card-body py-3">
                        <p class="mb-0">
                            <i class="bi bi-code-slash"></i>
                            Developed with <i class="bi bi-heart-fill text-danger"></i>
                            using PHP MVC Pattern & Bootstrap 5
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>