<!-- <?php
session_start();
if (!isset($_SESSION['admin_id'])) {
  header("Location: login_admin.php");
  exit;
}

$conn = new mysqli("localhost", "root", "", "samsat");

$id = $_GET['id'];
$action = $_GET['action'];

// Periksa apakah pengajuan ada
$stmt = $conn->prepare("SELECT * FROM pengajuan WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
  echo "Pengajuan tidak ditemukan.";
  exit;
}

$data = $result->fetch_assoc();

// Update status pengajuan berdasarkan tindakan admin
if ($action == 'approve') {
  $status = 'Disetujui';
} else {
  $status = 'Ditolak';
}

$stmt = $conn->prepare("UPDATE pengajuan SET status = ? WHERE id = ?");
$stmt->bind_param("si", $status, $id);
$stmt->execute();

header("Location: konfirmasi_pengajuan.php"); // Kembali ke halaman konfirmasi
?> -->
