<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: login.php");
  exit;
}

$conn = new mysqli("localhost", "root", "", "samsat");

// Ambil pengajuan yang belum disetujui
$sql_pengajuan = "SELECT * FROM pengajuan WHERE status = 'Pending'";
$result_pengajuan = $conn->query($sql_pengajuan);

// Ambil pembayaran yang sudah dilakukan
$sql_pembayaran = "SELECT * FROM pembayaran";
$result_pembayaran = $conn->query($sql_pembayaran);

// Ambil daftar pengguna
$sql_users = "SELECT * FROM users";
$result_users = $conn->query($sql_users);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin - Samsat</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container-fluid">
      <div class=""> 
      <div class="bg-dark text-white p-3"> 
        <h4 class="justify-content-center">Dashboard Admin</h4>
        <ul class="nav justify-content-center">
          <li class="nav-item">
            <a href="dashboard_admin.php" class="nav-link text-white">Home</a>
          </li>
          <li class="nav-item">
            <a href="konfirmasi_pengajuan.php" class="nav-link text-white">Pengajuan Pajak</a>
          </li>
          <li class="nav-item">
            <a href="pembayaran_admin.php" class="nav-link text-white">Pembayaran</a>
          </li>
          <li class="nav-item">
            <a href="user_management.php" class="nav-link text-white">User Management</a>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link text-white">Logout</a>
          </li>
        </ul>
        <!-- <ul class="nav justify-content-center">
  <li class="nav-item">
    <a class="nav_link text_white" aria-current="page" href="admin_dashboard.php">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="konfirmasi_pengajuan.php">Pengajuan Pajak</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text_white" href="pembayaran_admin.php">Pembayaran</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text_white" href="user_management.php">User Management</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" aria-disabled="true" href="logout.php">Logout</a>
  </li>
</ul> -->
      </div>
      <div class="col-md-15">
        <h2 class="mt-4 p-3 mb-2 bg-danger text-white" >Selamat Datang, Admin</h2>
        <div class="row mt-4">
          <!-- Pengajuan yang belum disetujui -->
          <div class="col-md-6">
            <h3>Pengajuan Pajak</h3>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Nama Pemilik</th>
                  <th>Nomor Kendaraan</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($row = $result_pengajuan->fetch_assoc()): ?>
                  <tr>
                    <td><?= htmlspecialchars($row['nama_pemilik']) ?></td>
                    <td><?= htmlspecialchars($row['nomor_kendaraan']) ?></td>
                    <td><?= $row['status'] ?></td>
                    <td>
                      <a href="konfirmasi_pengajuan.php?id=<?= $row['id'] ?>&action=approve" class="btn btn-success btn-sm">Setujui</a>
                      <a href="konfirmasi_pengajuan.php?id=<?= $row['id'] ?>&action=reject" class="btn btn-danger btn-sm">Tolak</a>
                    </td>
                  </tr>
                <?php endwhile; ?>
              </tbody>
            </table>
          </div>
          
          <!-- Pembayaran -->
          <div class="col-md-6">
            <h3>Pembayaran</h3>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Nama Pemilik</th>
                  <th>Nomor Kendaraan</th>
                  <th>Jumlah Bayar</th>
                  <th>Tanggal Pembayaran</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($row = $result_pembayaran->fetch_assoc()): ?>
                  <tr>
                    <td><?= htmlspecialchars($row['nama_pemilik']) ?></td>
                    <td><?= htmlspecialchars($row['nomor_kendaraan']) ?></td>
                    <td><?= number_format($row['jumlah_bayar'], 0, ',', '.') ?></td>
                    <td><?= $row['tanggal_bayar'] ?></td>
                  </tr>
                <?php endwhile; ?>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Daftar Pengguna -->
        <h3 class="mt-4">Daftar Pengguna</h3>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Email</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = $result_users->fetch_assoc()): ?>
              <tr>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><a href="view_user.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">Lihat</a></td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
