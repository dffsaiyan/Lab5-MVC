<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px 0;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            border: none;
        }
        .table-responsive {
            border-radius: 10px;
            overflow: hidden;
        }
        .btn-action {
            padding: 5px 12px;
            font-size: 14px;
            margin: 2px;
        }
        .product-image {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
        }
        .search-box {
            border-radius: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center mb-0">
                            <i class="bi bi-bag-fill text-primary"></i> 
                            Quản lý sản phẩm
                        </h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Thông báo -->
        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill"></i> <?= $_SESSION['success'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle-fill"></i> <?= $_SESSION['error'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <!-- Main Card -->
        <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3">
                <h5 class="mb-0"><i class="bi bi-list-ul"></i> Danh sách sản phẩm</h5>
                <a href="index.php?page=product-add" class="btn btn-light btn-sm">
                    <i class="bi bi-plus-circle"></i> Thêm sản phẩm mới
                </a>
            </div>
            <div class="card-body">
                <!-- Search Form -->
                <form action="index.php" method="GET" class="mb-4">
                    <input type="hidden" name="page" value="product-list">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control search-box" 
                               placeholder="Tìm kiếm sản phẩm theo tên..." 
                               value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
                        <button class="btn btn-primary" type="submit">
                            <i class="bi bi-search"></i> Tìm kiếm
                        </button>
                        <?php if (isset($_GET['search'])): ?>
                            <a href="index.php?page=product-list" class="btn btn-outline-secondary">
                                <i class="bi bi-x-circle"></i> Xóa
                            </a>
                        <?php endif; ?>
                    </div>
                </form>

                <!-- Products Table -->
                <?php if (empty($products)): ?>
                    <div class="alert alert-info text-center">
                        <i class="bi bi-info-circle"></i> Không có sản phẩm nào.
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th style="width: 80px;">ID</th>
                                    <th style="width: 100px;">Hình ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th style="width: 150px;">Giá</th>
                                    <th style="width: 200px;" class="text-center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($products as $product): ?>
                                    <tr>
                                        <td><strong>#<?= $product['id'] ?></strong></td>
                                        <td>
                                            <?php if ($product['image']): ?>
                                                <img src="<?= htmlspecialchars($product['image']) ?>" 
                                                     alt="<?= htmlspecialchars($product['name']) ?>" 
                                                     class="product-image">
                                            <?php else: ?>
                                                <div class="product-image bg-secondary d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-image text-white"></i>
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <strong><?= htmlspecialchars($product['name']) ?></strong>
                                            <?php if ($product['description']): ?>
                                                <br>
                                                <small class="text-muted">
                                                    <?= htmlspecialchars(substr($product['description'], 0, 50)) ?>
                                                    <?= strlen($product['description']) > 50 ? '...' : '' ?>
                                                </small>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <span class="badge bg-success fs-6">
                                                <?= number_format($product['price'], 0, ',', '.') ?> ₫
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <a href="index.php?page=product-detail&id=<?= $product['id'] ?>" 
                                               class="btn btn-info btn-action" title="Xem chi tiết">
                                                <i class="bi bi-eye"></i> Chi tiết
                                            </a>
                                            <a href="index.php?page=product-edit&id=<?= $product['id'] ?>" 
                                               class="btn btn-warning btn-action" title="Chỉnh sửa">
                                                <i class="bi bi-pencil-square"></i> Sửa
                                            </a>
                                            <a href="index.php?page=product-delete&id=<?= $product['id'] ?>" 
                                               class="btn btn-danger btn-action" 
                                               onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')"
                                               title="Xóa">
                                                <i class="bi bi-trash"></i> Xóa
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3 text-muted">
                        <i class="bi bi-info-circle"></i> Tổng số: <strong><?= count($products) ?></strong> sản phẩm
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Navigation -->
        <div class="row mt-4">
            <div class="col-12 text-center">
                <a href="index.php?page=home" class="btn btn-outline-light">
                    <i class="bi bi-house"></i> Về trang chủ
                </a>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
