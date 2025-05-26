<?php
$conn = new mysqli("localhost", "root", "", "samsat");
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$conn->query("INSERT INTO users (email, password) VALUES ('$email', '$password')");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrasi Berhasil</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #e9ecef;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .result-card {
      background-color: #fff;
      padding: 40px 30px;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      width: 100%;
      text-align: center;
    }
    .result-card h3 {
      margin-bottom: 25px;
    }
    .result-card img {
      width: 80px;
      margin-bottom: 15px;
    }
    .result-card a {
      color: #0d6efd;
      text-decoration: none;
      font-weight: bold;
    }
    .result-card a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

<div class="result-card">
  <img src="https://cdn-icons-png.flaticon.com/512/2975/2975804.png" alt="Success Icon">
  <h3>Registrasi Berhasil!</h3>
  <p>Akun Anda telah berhasil dibuat. Silakan login untuk melanjutkan.</p>
  <a href="login_user.php">Login di sini</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
