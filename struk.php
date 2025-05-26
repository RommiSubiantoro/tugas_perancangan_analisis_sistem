<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: login_user.php");
  exit;
}
?>

<?php
$conn = new mysqli("localhost", "root", "", "samsat");
$id = $_GET['id'];

$query = "SELECT p.*, b.jumlah_bayar, b.tanggal_bayar
          FROM pengajuan p
          JOIN pembayaran b ON p.id = b.id_pengajuan
          WHERE p.id = $id";

$data = $conn->query($query)->fetch_assoc();

echo "<h3>Struk Pembayaran Pajak</h3>";
echo "Nama Pemilik: " . $data['nama_pemilik'] . "<br>";
echo "Nomor Kendaraan: " . $data['nomor_kendaraan'] . "<br>";
echo "Jenis Kendaraan: " . $data['jenis_kendaraan'] . "<br>";
echo "Jumlah Bayar: Rp" . number_format($data['jumlah_bayar']) . "<br>";
echo "Tanggal Bayar: " . $data['tanggal_bayar'] . "<br>";
?>
