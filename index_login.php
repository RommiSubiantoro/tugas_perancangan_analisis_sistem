<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pilih Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .login-box {
      background-color: white;
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 700px;
    }
    .login-option {
      padding: 30px 20px;
      border-radius: 8px;
      background-color: #e9ecef;
      text-align: center;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .login-option:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 15px rgba(0,0,0,0.15);
    }
    .login-option a {
      text-decoration: none;
      font-weight: bold;
      font-size: 18px;
      color: #0d6efd;
    }
    .login-option a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

<div class="login-box">
  <h4 class="text-center mb-4">Silakan Pilih Login</h4>
  <div class="row">
    <!-- Login Admin -->
    <div class="col-md-6 mb-3">
      <div class="login-option">
        <p>Login sebagai Admin</p>
        <a href="admin_dashboard.php">Masuk Admin</a>
      </div>
    </div>

    <!-- Login User -->
    <div class="col-md-6 mb-3">
      <div class="login-option">
        <p>Login sebagai User</p>
        <a href="user_dashboard.php">Masuk User</a>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
