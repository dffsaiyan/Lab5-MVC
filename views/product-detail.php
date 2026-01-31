<!DOCTYPE html>
<html lang="vi">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Chi tiết sản phẩm -
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

          .product-image-large {
               width: 100%;
               height: 400px;
               object-fit: cover;
               border-radius: 10px;
          }

          .info-label {
               font-weight: 600;
               color: #667eea;
          }

          .info-value {
               font-size: 1.1rem;
          }

          .price-badge {
               font-size: 2rem;
               padding: 15px 30px;
          }
     </style>
</head>

<body>
     <div class="container">
          <div class="row justify-content-center">
               <div class="col-md-10">
                    <!-- Header Card -->
                    <div class="card mb-4">
                         <div class="card-body">
                              <h1 class="text-center mb-0">
                                   <i class="bi bi-box-seam text-info"></i>
                                   Chi tiết sản phẩm
                              </h1>
                         </div>
                    </div>

                    <!-- Product Detail Card -->
                    <div class="card">
                         <div class="card-body p-4">
                              <div class="row">
                                   <!-- Product Image -->
                                   <div class="col-md-5 mb-4">
                                        <?php if ($product['image']): ?>
                                             <img src="<?= htmlspecialchars($product['image']) ?>"
                                                  alt="<?= htmlspecialchars($product['name']) ?>"
                                                  class="product-image-large shadow">
                                        <?php else: ?>
                                             <div
                                                  class="product-image-large bg-secondary d-flex align-items-center justify-content-center shadow">
                                                  <i class="bi bi-image text-white" style="font-size: 100px;"></i>
                                             </div>
                                        <?php endif; ?>
                                   </div>

                                   <!-- Product Info -->
                                   <div class="col-md-7">
                                        <div class="mb-4">
                                             <span class="badge bg-primary mb-2">ID: #
                                                  <?= $product['id'] ?>
                                             </span>
                                             <h2 class="display-5 fw-bold">
                                                  <?= htmlspecialchars($product['name']) ?>
                                             </h2>
                                        </div>

                                        <div class="mb-4">
                                             <div class="d-flex align-items-center">
                                                  <span class="badge bg-success price-badge">
                                                       <?= number_format($product['price'], 0, ',', '.') ?> ₫
                                                  </span>
                                             </div>
                                        </div>

                                        <hr>

                                        <!-- Description -->
                                        <div class="mb-4">
                                             <p class="info-label mb-2">
                                                  <i class="bi bi-card-text"></i> Mô tả sản phẩm:
                                             </p>
                                             <p class="info-value">
                                                  <?php if ($product['description']): ?>
                                                       <?= nl2br(htmlspecialchars($product['description'])) ?>
                                                  <?php else: ?>
                                                       <em class="text-muted">Chưa có mô tả</em>
                                                  <?php endif; ?>
                                             </p>
                                        </div>

                                        <hr>

                                        <!-- Timestamps -->
                                        <div class="row mb-4">
                                             <div class="col-md-6">
                                                  <p class="info-label mb-1">
                                                       <i class="bi bi-calendar-plus"></i> Ngày tạo:
                                                  </p>
                                                  <p class="text-muted">
                                                       <?= isset($product['created_at']) ? date('d/m/Y H:i', strtotime($product['created_at'])) : 'N/A' ?>
                                                  </p>
                                             </div>
                                             <div class="col-md-6">
                                                  <p class="info-label mb-1">
                                                       <i class="bi bi-calendar-check"></i> Cập nhật:
                                                  </p>
                                                  <p class="text-muted">
                                                       <?= isset($product['updated_at']) ? date('d/m/Y H:i', strtotime($product['updated_at'])) : 'N/A' ?>
                                                  </p>
                                             </div>
                                        </div>

                                        <!-- Action Buttons -->
                                        <div class="d-grid gap-2">
                                             <a href="index.php?page=product-edit&id=<?= $product['id'] ?>"
                                                  class="btn btn-warning btn-lg">
                                                  <i class="bi bi-pencil-square"></i> Chỉnh sửa sản phẩm
                                             </a>
                                             <a href="index.php?page=product-delete&id=<?= $product['id'] ?>"
                                                  class="btn btn-danger btn-lg"
                                                  onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">
                                                  <i class="bi bi-trash"></i> Xóa sản phẩm
                                             </a>
                                             <a href="index.php?page=product-list"
                                                  class="btn btn-outline-secondary btn-lg">
                                                  <i class="bi bi-arrow-left"></i> Quay lại danh sách
                                             </a>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>

     <!-- Bootstrap 5 JS -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>