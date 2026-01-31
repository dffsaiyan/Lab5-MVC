<!DOCTYPE html>
<html lang="vi">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Thêm sinh viên mới</title>
     <!-- Bootstrap 5 CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
     <!-- Bootstrap Icons -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
     <style>
          body {
               background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
               min-height: 100vh;
               padding: 40px 0;
          }

          .card {
               border-radius: 15px;
               box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
               border: none;
          }

          .form-control:focus,
          .form-select:focus {
               border-color: #667eea;
               box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
          }

          .btn-primary {
               background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
               border: none;
          }

          .btn-primary:hover {
               transform: translateY(-2px);
               box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
          }
     </style>
</head>

<body>
     <div class="container">
          <div class="row justify-content-center">
               <div class="col-md-8 col-lg-6">
                    <!-- Header Card -->
                    <div class="card mb-4">
                         <div class="card-body">
                              <h1 class="text-center mb-0">
                                   <i class="bi bi-person-plus-fill text-primary"></i>
                                   Thêm sinh viên mới
                              </h1>
                         </div>
                    </div>

                    <!-- Error Messages -->
                    <?php if (isset($_SESSION['errors'])): ?>
                         <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              <strong><i class="bi bi-exclamation-triangle-fill"></i> Có lỗi xảy ra:</strong>
                              <ul class="mb-0 mt-2">
                                   <?php foreach ($_SESSION['errors'] as $error): ?>
                                        <li>
                                             <?= htmlspecialchars($error) ?>
                                        </li>
                                   <?php endforeach; ?>
                              </ul>
                              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                         </div>
                         <?php unset($_SESSION['errors']); ?>
                    <?php endif; ?>

                    <!-- Form Card -->
                    <div class="card">
                         <div class="card-header bg-primary text-white">
                              <h5 class="mb-0"><i class="bi bi-pencil-square"></i> Thông tin sinh viên</h5>
                         </div>
                         <div class="card-body p-4">
                              <form action="index.php?page=student-store" method="POST">
                                   <!-- Họ tên -->
                                   <div class="mb-3">
                                        <label for="name" class="form-label">
                                             <i class="bi bi-person"></i> Họ và tên <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control form-control-lg" id="name" name="name"
                                             placeholder="Nhập họ và tên sinh viên"
                                             value="<?= htmlspecialchars($_SESSION['old']['name'] ?? '') ?>" required>
                                   </div>

                                   <!-- Email -->
                                   <div class="mb-3">
                                        <label for="email" class="form-label">
                                             <i class="bi bi-envelope"></i> Email
                                        </label>
                                        <input type="email" class="form-control form-control-lg" id="email" name="email"
                                             placeholder="example@email.com"
                                             value="<?= htmlspecialchars($_SESSION['old']['email'] ?? '') ?>">
                                        <small class="text-muted">
                                             <i class="bi bi-info-circle"></i> Email dùng để liên hệ
                                        </small>
                                   </div>

                                   <!-- Số điện thoại -->
                                   <div class="mb-3">
                                        <label for="phone" class="form-label">
                                             <i class="bi bi-telephone"></i> Số điện thoại
                                        </label>
                                        <input type="tel" class="form-control form-control-lg" id="phone" name="phone"
                                             placeholder="0123456789"
                                             value="<?= htmlspecialchars($_SESSION['old']['phone'] ?? '') ?>">
                                   </div>

                                   <!-- Địa chỉ -->
                                   <div class="mb-4">
                                        <label for="address" class="form-label">
                                             <i class="bi bi-geo-alt"></i> Địa chỉ
                                        </label>
                                        <textarea class="form-control" id="address" name="address" rows="3"
                                             placeholder="Nhập địa chỉ sinh viên..."><?= htmlspecialchars($_SESSION['old']['address'] ?? '') ?></textarea>
                                   </div>

                                   <!-- Buttons -->
                                   <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary btn-lg">
                                             <i class="bi bi-check-circle"></i> Thêm sinh viên
                                        </button>
                                        <a href="index.php?page=students" class="btn btn-outline-secondary">
                                             <i class="bi bi-arrow-left"></i> Quay lại danh sách
                                        </a>
                                   </div>
                              </form>
                         </div>
                    </div>

                    <?php unset($_SESSION['old']); ?>
               </div>
          </div>
     </div>

     <!-- Bootstrap 5 JS -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>