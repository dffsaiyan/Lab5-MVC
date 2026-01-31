<!DOCTYPE html>
<html lang="vi">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Chỉnh sửa sản phẩm -
          <?= htmlspecialchars($product['name']) ?>
     </title>
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

          .btn-warning {
               background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
               border: none;
               color: #000;
          }

          .btn-warning:hover {
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
                                   <i class="bi bi-pencil-square text-warning"></i>
                                   Chỉnh sửa sản phẩm
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
                         <div class="card-header bg-warning text-dark">
                              <h5 class="mb-0">
                                   <i class="bi bi-info-circle"></i>
                                   Sản phẩm ID: #
                                   <?= $product['id'] ?>
                              </h5>
                         </div>
                         <div class="card-body p-4">
                              <form action="index.php?page=product-update" method="POST">
                                   <!-- Hidden ID -->
                                   <input type="hidden" name="id" value="<?= $product['id'] ?>">

                                   <!-- Tên sản phẩm -->
                                   <div class="mb-3">
                                        <label for="name" class="form-label">
                                             <i class="bi bi-tag"></i> Tên sản phẩm <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control form-control-lg" id="name" name="name"
                                             placeholder="Nhập tên sản phẩm"
                                             value="<?= htmlspecialchars($_SESSION['old']['name'] ?? $product['name']) ?>"
                                             required>
                                   </div>

                                   <!-- Giá -->
                                   <div class="mb-3">
                                        <label for="price" class="form-label">
                                             <i class="bi bi-currency-dollar"></i> Giá <span
                                                  class="text-danger">*</span>
                                        </label>
                                        <div class="input-group input-group-lg">
                                             <input type="number" class="form-control" id="price" name="price"
                                                  placeholder="0" min="0" step="0.01"
                                                  value="<?= htmlspecialchars($_SESSION['old']['price'] ?? $product['price']) ?>"
                                                  required>
                                             <span class="input-group-text">₫</span>
                                        </div>
                                   </div>

                                   <!-- Mô tả -->
                                   <div class="mb-3">
                                        <label for="description" class="form-label">
                                             <i class="bi bi-card-text"></i> Mô tả
                                        </label>
                                        <textarea class="form-control" id="description" name="description" rows="4"
                                             placeholder="Nhập mô tả sản phẩm..."><?= htmlspecialchars($_SESSION['old']['description'] ?? $product['description']) ?></textarea>
                                   </div>

                                   <!-- Hình ảnh URL -->
                                   <div class="mb-4">
                                        <label for="image" class="form-label">
                                             <i class="bi bi-image"></i> URL Hình ảnh
                                        </label>
                                        <input type="text" class="form-control" id="image" name="image"
                                             placeholder="https://example.com/image.jpg"
                                             value="<?= htmlspecialchars($_SESSION['old']['image'] ?? $product['image']) ?>">
                                        <small class="text-muted">
                                             <i class="bi bi-info-circle"></i> Nhập đường dẫn URL hình ảnh sản phẩm
                                        </small>

                                        <!-- Image Preview -->
                                        <?php if ($product['image']): ?>
                                             <div class="mt-3">
                                                  <p class="mb-2"><strong>Hình ảnh hiện tại:</strong></p>
                                                  <img src="<?= htmlspecialchars($product['image']) ?>"
                                                       alt="<?= htmlspecialchars($product['name']) ?>" class="img-thumbnail"
                                                       style="max-width: 200px;">
                                             </div>
                                        <?php endif; ?>
                                   </div>

                                   <!-- Buttons -->
                                   <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-warning btn-lg">
                                             <i class="bi bi-check-circle"></i> Cập nhật sản phẩm
                                        </button>
                                        <a href="index.php?page=product-detail&id=<?= $product['id'] ?>"
                                             class="btn btn-outline-info">
                                             <i class="bi bi-eye"></i> Xem chi tiết
                                        </a>
                                        <a href="index.php?page=product-list" class="btn btn-outline-secondary">
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