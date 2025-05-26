<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: login_user.php");
  exit;
}

$conn = new mysqli("localhost", "root", "", "samsat");
$user_id = $_SESSION['user_id'];

$result = $conn->query("
  SELECT p.*, 
         (SELECT id FROM pembayaran WHERE id_pengajuan = p.id LIMIT 1) AS sudah_bayar
  FROM pengajuan p 
  WHERE user_id = '$user_id' 
  ORDER BY id DESC
");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Riwayat Pengajuan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h3 class="mb-4">Riwayat Pengajuan Pajak Kendaraan</h3>
  <a href="form_pengajuan.php" class="btn btn-success mb-3">+ Pengajuan Baru</a>
  <a href="logout.php" class="btn btn-secondary mb-3 float-end">Logout</a>

  <table class="table table-bordered bg-white shadow">
    <thead>
      <tr>
        <th>Nama Pemilik</th>
        <th>Nomor Kendaraan</th>
        <th>Jenis Kendaraan</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= htmlspecialchars($row['nama_pemilik']) ?></td>
        <td><?= htmlspecialchars($row['nomor_kendaraan']) ?></td>
        <td><?= htmlspecialchars($row['jenis_kendaraan']) ?></td>
        <td>
          <?php
            if ($row['status'] == 'Disetujui') {
              echo "<span class='badge bg-success'>Disetujui</span>";
            } elseif ($row['status'] == 'Ditolak') {
              echo "<span class='badge bg-danger'>Ditolak</span>";
            } else {
              echo "<span class='badge bg-warning text-dark'>Pending</span>";
            }
          ?>
        </td>
        <td>
          <?php if ($row['status'] == 'Disetujui' && !$row['sudah_bayar']): ?>
            <a href="form_pembayaran.php?id_pengajuan=<?= $row['id'] ?>" class="btn btn-sm btn-primary">Lanjut Bayar</a>
          <?php elseif ($row['sudah_bayar']): ?>
            <span class="badge bg-info">Sudah Dibayar</span>
          <?php else: ?>
            <span class="text-muted">Menunggu</span>
          <?php endif; ?>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
</body>
</html>
