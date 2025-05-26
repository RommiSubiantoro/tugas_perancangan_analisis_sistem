<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: login_user.php");
  exit;
}

if (!isset($_GET['id'])) {
  echo "ID pembayaran tidak ditemukan.";
  exit;
}

$conn = new mysqli("localhost", "root", "", "samsat");
$id_pembayaran = $_GET['id'];

$query = $conn->prepare("
  SELECT p.*, pj.nama_pemilik, pj.nomor_kendaraan, pj.jenis_kendaraan, pj.user_id 
  FROM pembayaran p 
  JOIN pengajuan pj ON p.id_pengajuan = pj.id 
  WHERE p.id = ?
");
$query->bind_param("i", $id_pembayaran);
$query->execute();
$result = $query->get_result();

if ($result->num_rows == 0) {
  echo "Data pembayaran tidak ditemukan.";
  exit;
}

$data = $result->fetch_assoc();

// Cek apakah data ini milik user yang login
if ($data['user_id'] != $_SESSION['user_id']) {
  echo "Akses ditolak.";
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Struk Pembayaran</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .struk { max-width: 600px; margin: auto; background: #fff; padding: 20px; border: 1px solid #ccc; }
    .print-btn { margin-top: 20px; }
  </style>
</head>
<body class="bg-light">
<div class="struk mt-5">
  <h3 class="text-center">Struk Pembayaran Pajak Kendaraan</h3>
  <hr>
  <p><strong>Nama Pemilik:</strong> <?= htmlspecialchars($data['nama_pemilik']) ?></p>
  <p><strong>Nomor Kendaraan:</strong> <?= htmlspecialchars($data['nomor_kendaraan']) ?></p>
  <p><strong>Jenis Kendaraan:</strong> <?= htmlspecialchars($data['jenis_kendaraan']) ?></p>
  <p><strong>Jumlah Bayar:</strong> Rp <?= number_format($data['jumlah_bayar'], 0, ',', '.') ?></p>
  <p><strong>Tanggal Bayar:</strong> <?= $data['tanggal_bayar'] ?></p>
  <hr>
  <p class="text-center text-muted">Terima kasih. Simpan struk ini sebagai bukti pembayaran.</p>
  <div class="text-center print-btn">
    <button class="btn btn-primary" onclick="window.print()">Cetak Struk</button>
    <a href="riwayat_pengajuan.php" class="btn btn-secondary">Kembali</a>
  </div>
</div>
</body>
</html>
