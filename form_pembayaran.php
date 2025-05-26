 <?php
// session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: login_user.php");
  exit;
}

if (!isset($_GET['id_pengajuan'])) {
  echo "ID Pengajuan tidak ditemukan.";
  exit;
}

$conn = new mysqli("localhost", "root", "", "samsat");
$id_pengajuan = $_GET['id_pengajuan'];

// Pastikan pengajuan milik user yang sedang login dan sudah disetujui
$stmt = $conn->prepare("SELECT * FROM pengajuan WHERE id = ? AND user_id = ? AND status = 'Disetujui'");
$stmt->bind_param("ii", $id_pengajuan, $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
  echo "Data pengajuan tidak valid atau belum disetujui.";
  exit;
}
$data = $result->fetch_assoc();
?> -->

<!DOCTYPE html>
<html>
<head>
  <title>Pembayaran Pajak</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <div class="card p-4 shadow">
    <h3 class="mb-4">Pembayaran Pajak Kendaraan</h3>
  <form method="post" action="simpan_pembayaran.php" enctype="multipart/form-data">
      <input type="hidden" name="id_pengajuan" value="<?= $data['id'] ?>">
      <div class="mb-3">
        <label class="form-label">Nama Pemilik</label>
        <input type="text" class="form-control" value="<?= htmlspecialchars($data['nama_pemilik']) ?>" disabled>
      </div>
      <div class="mb-3">
        <label class="form-label">Nomor Kendaraan</label>
        <input type="text" class="form-control" value="<?= htmlspecialchars($data['nomor_kendaraan']) ?>" disabled>
      </div>
      <div class="mb-3">
        <label class="form-label">Jumlah Bayar</label>
        <input type="number" name="jumlah_bayar" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Jumlah yang Harus Dibayar</label>
        <input type="text" class="form-control" value="<?= number_format($data['jumlah_yang_harus_dibayar'], 0, ',', '.') ?>" disabled>
      </div>
      <div><label>Metode Pembayaran:</label><br>
      <select name="metode_pembayaran" required>
        <option value="bank_transfer">Transfer Bank</option>
        <option value="ewallet_dana">DANA</option>
        <option value="ewallet_gopay">GoPay</option>
        <option value="ewallet_ovo">OVO</option>
      </select><br><br>

      <label>Upload Bukti Pembayaran:</label>
      <input type="file" name="bukti_pembayaran" accept="image/*" required><br><br></div> 
      <button type="submit" class="btn btn-primary">Bayar</button>
    </form>
  </div>
</div>
</body>
</html> 
