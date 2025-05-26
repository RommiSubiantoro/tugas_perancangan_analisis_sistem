<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register User</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f1f3f5;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .register-card {
      background: #fff;
      padding: 40px 30px;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      max-width: 450px;
      width: 100%;
    }
    .register-card h3 {
      text-align: center;
      margin-bottom: 25px;
    }
    .register-card img {
      width: 70px;
      display: block;
      margin: 0 auto 15px;
    }
    .back-link {
      text-align: center;
      margin-top: 15px;
    }
    .back-link a {
      text-decoration: none;
      color: #0d6efd;
      font-weight: 500;
    }
    .back-link a:hover {
      text-decoration: underline;
    }
    .btn-primary:hover {
      background-color: #0b5ed7;
      box-shadow: 0 5px 15px rgba(13, 110, 253, 0.4);
    }
  </style>
</head>
<body>

<div class="register-card">
  <img src="https://cdn-icons-png.flaticon.com/512/747/747545.png" alt="Register Icon">
  <h3>Daftar Akun Baru</h3>
  <form method="post" action="simpan_user.php">
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email" required>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" required>
    </div>
    <div class="d-grid">
      <button type="submit" class="btn btn-primary">Daftar</button>
    </div>
  </form>
  <div class="back-link">
    <p>Sudah punya akun? <a href="login_user.php">Login di sini</a></p>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
