<!DOCTYPE html>
<html lang="vi">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Chi tiết sinh viên -
          <?= htmlspecialchars($student['name']) ?>
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

          .info-label {
               font-weight: 600;
               color: #667eea;
               margin-bottom: 5px;
          }

          .info-value {
               font-size: 1.1rem;
               margin-bottom: 20px;
          }

          .avatar {
               width: 150px;
               height: 150px;
               border-radius: 50%;
               background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
               display: flex;
               align-items: center;
               justify-content: center;
               margin: 0 auto 20px;
          }

          .avatar i {
               font-size: 80px;
               color: white;
          }
     </style>
</head>

<body>
     <div class="container">
          <div class="row justify-content-center">
               <div class="col-md-8">
                    <!-- Header Card -->
                    <div class="card mb-4">
                         <div class="card-body">
                              <h1 class="text-center mb-0">
                                   <i class="bi bi-person-badge text-info"></i>
                                   Chi tiết sinh viên
                              </h1>
                         </div>
                    </div>

                    <!-- Student Detail Card -->
                    <div class="card">
                         <div class="card-body p-4">
                              <!-- Avatar -->
                              <div class="avatar">
                                   <i class="bi bi-person-fill"></i>
                              </div>

                              <div class="text-center mb-4">
                                   <span class="badge bg-primary mb-2">ID: #
                                        <?= $student['id'] ?>
                                   </span>
                                   <h2 class="display-6 fw-bold">
                                        <?= htmlspecialchars($student['name']) ?>
                                   </h2>
                              </div>

                              <hr>

                              <!-- Student Info -->
                              <div class="row">
                                   <div class="col-md-6">
                                        <p class="info-label">
                                             <i class="bi bi-envelope"></i> Email:
                                        </p>
                                        <p class="info-value">
                                             <?php if ($student['email']): ?>
                                                  <a href="mailto:<?= htmlspecialchars($student['email']) ?>">
                                                       <?= htmlspecialchars($student['email']) ?>
                                                  </a>
                                             <?php else: ?>
                                                  <em class="text-muted">Chưa cập nhật</em>
                                             <?php endif; ?>
                                        </p>
                                   </div>

                                   <div class="col-md-6">
                                        <p class="info-label">
                                             <i class="bi bi-telephone"></i> Số điện thoại:
                                        </p>
                                        <p class="info-value">
                                             <?php if ($student['phone']): ?>
                                                  <a href="tel:<?= htmlspecialchars($student['phone']) ?>">
                                                       <?= htmlspecialchars($student['phone']) ?>
                                                  </a>
                                             <?php else: ?>
                                                  <em class="text-muted">Chưa cập nhật</em>
                                             <?php endif; ?>
                                        </p>
                                   </div>
                              </div>

                              <div class="mb-4">
                                   <p class="info-label">
                                        <i class="bi bi-geo-alt"></i> Địa chỉ:
                                   </p>
                                   <p class="info-value">
                                        <?php if ($student['address']): ?>
                                             <?= nl2br(htmlspecialchars($student['address'])) ?>
                                        <?php else: ?>
                                             <em class="text-muted">Chưa cập nhật</em>
                                        <?php endif; ?>
                                   </p>
                              </div>

                              <hr>

                              <!-- Action Buttons -->
                              <div class="d-grid gap-2">
                                   <a href="index.php?page=student-edit&id=<?= $student['id'] ?>"
                                        class="btn btn-warning btn-lg">
                                        <i class="bi bi-pencil-square"></i> Chỉnh sửa thông tin
                                   </a>
                                   <a href="index.php?page=student-delete&id=<?= $student['id'] ?>"
                                        class="btn btn-danger btn-lg"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa sinh viên này?')">
                                        <i class="bi bi-trash"></i> Xóa sinh viên
                                   </a>
                                   <a href="index.php?page=students" class="btn btn-outline-secondary btn-lg">
                                        <i class="bi bi-arrow-left"></i> Quay lại danh sách
                                   </a>
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