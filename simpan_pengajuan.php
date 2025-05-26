<?php
session_start();
$conn = new mysqli("localhost", "root", "", "samsat");

$nama = $_POST['nama_pemilik'];
$nomor = $_POST['nomor_kendaraan'];
$jenis = $_POST['jenis_kendaraan'];
$user_id = $_SESSION['user_id']; // ID user yang sedang login

// Misalnya, jumlah pajak dihitung berdasarkan jenis kendaraan (contoh sederhana)
$jumlah_pajak = ($jenis == 'Mobil') ? 500000 : 300000; // Contoh jumlah pajak

$sql = "INSERT INTO pengajuan (nama_pemilik, nomor_kendaraan, jenis_kendaraan, user_id, status) 
        VALUES ('$nama', '$nomor', '$jenis', '$user_id', 'Pending')";

if ($conn->query($sql)) {
  echo "Pengajuan berhasil disimpan. Tunggu konfirmasi dari admin.";
} else {
  echo "Gagal menyimpan: " . $conn->error;
}
?>
<a href="user_dashboard.php">Kembali</a>