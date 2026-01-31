<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
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
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
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
                            <i class="bi bi-people-fill text-info"></i>
                            Quản lý sinh viên
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
            <div class="card-header bg-info text-white d-flex justify-content-between align-items-center py-3">
                <h5 class="mb-0"><i class="bi bi-list-ul"></i> Danh sách sinh viên</h5>
                <a href="index.php?page=student-add" class="btn btn-light btn-sm">
                    <i class="bi bi-plus-circle"></i> Thêm sinh viên mới
                </a>
            </div>
            <div class="card-body">
                <!-- Students Table -->
                <?php if (empty($students)): ?>
                    <div class="alert alert-info text-center">
                        <i class="bi bi-info-circle"></i> Chưa có sinh viên nào.
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th style="width: 80px;">ID</th>
                                    <th>Họ và tên</th>
                                    <th style="width: 200px;">Email</th>
                                    <th style="width: 150px;">Số điện thoại</th>
                                    <th style="width: 250px;" class="text-center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($students as $student): ?>
                                    <tr>
                                        <td><strong>#<?= $student['id'] ?></strong></td>
                                        <td>
                                            <strong><?= htmlspecialchars($student['name']) ?></strong>
                                            <?php if ($student['address']): ?>
                                                <br>
                                                <small class="text-muted">
                                                    <i class="bi bi-geo-alt"></i>
                                                    <?= htmlspecialchars(substr($student['address'], 0, 30)) ?>
                                                    <?= strlen($student['address']) > 30 ? '...' : '' ?>
                                                </small>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if ($student['email']): ?>
                                                <a href="mailto:<?= htmlspecialchars($student['email']) ?>">
                                                    <i class="bi bi-envelope"></i>
                                                    <?= htmlspecialchars($student['email']) ?>
                                                </a>
                                            <?php else: ?>
                                                <em class="text-muted">Chưa có</em>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if ($student['phone']): ?>
                                                <a href="tel:<?= htmlspecialchars($student['phone']) ?>">
                                                    <i class="bi bi-telephone"></i>
                                                    <?= htmlspecialchars($student['phone']) ?>
                                                </a>
                                            <?php else: ?>
                                                <em class="text-muted">Chưa có</em>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="index.php?page=student-detail&id=<?= $student['id'] ?>"
                                                class="btn btn-info btn-action" title="Xem chi tiết">
                                                <i class="bi bi-eye"></i> Chi tiết
                                            </a>
                                            <a href="index.php?page=student-edit&id=<?= $student['id'] ?>"
                                                class="btn btn-warning btn-action" title="Chỉnh sửa">
                                                <i class="bi bi-pencil-square"></i> Sửa
                                            </a>
                                            <a href="index.php?page=student-delete&id=<?= $student['id'] ?>"
                                                class="btn btn-danger btn-action"
                                                onclick="return confirm('Bạn có chắc chắn muốn xóa sinh viên này?')"
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
                        <i class="bi bi-info-circle"></i> Tổng số: <strong><?= count($students) ?></strong> sinh viên
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