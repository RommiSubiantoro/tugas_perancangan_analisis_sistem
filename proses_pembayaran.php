<?php
$conn = new mysqli("localhost", "root", "", "samsat");

$id_pengajuan = $_POST['id_pengajuan'];
$jumlah = $_POST['jumlah_bayar'];

$sql = "INSERT INTO pembayaran (id_pengajuan, jumlah_bayar) VALUES ('$id_pengajuan', '$jumlah')";

if ($conn->query($sql)) {
  echo "Pembayaran berhasil. <a href='struk.php?id=$id_pengajuan'>Lihat Struk</a>";
} else {
  echo "Gagal bayar: " . $conn->error;
}
?>
