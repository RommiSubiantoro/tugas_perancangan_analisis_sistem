<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: login_user.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f4f6f9;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .dashboard-card {
      background: #fff;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 500px;
      text-align: center;
    }
    .dashboard-card h2 {
      margin-bottom: 30px;
    }
    .dashboard-card a {
      text-decoration: none;
      display: block;
      margin: 15px 0;
      padding: 10px;
      background-color: #0d6efd;
      color: white;
      border-radius: 5px;
      font-weight: bold;
      text-align: center;
    }
    .dashboard-card a:hover {
      background-color: #0056b3;
    }
    .logout-link {
      text-decoration: none;
      color: #dc3545;
      font-weight: bold;
      margin-top: 20px;
    }
    .logout-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

<div class="dashboard-card">
  <h2>Selamat datang, <?php echo $_SESSION['user_id']; ?>!</h2>
  <a href="form_pengajuan.php">Ajukan Pajak Kendaraan</a>
  <a href="form_pembayaran.php">Bayar Pajak</a>
  <a href="logout_user.php" class="logout-link">Logout</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
