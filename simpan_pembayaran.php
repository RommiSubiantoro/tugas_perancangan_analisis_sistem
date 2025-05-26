<?php
include 'koneksi.php';

$id_pengajuan = $_POST['id_pengajuan'];
$jumlah = $_POST['jumlah'];
$tanggal = date('Y-m-d');
$metode = $_POST['metode_pembayaran'];

$bukti = $_FILES['bukti_pembayaran']['name'];
$tmp_bukti = $_FILES['bukti_pembayaran']['tmp_name'];
$upload_dir = "bukti/";

move_uploaded_file($tmp_bukti, $upload_dir . $bukti);

$query = "INSERT INTO pembayaran (id_pengajuan, jumlah, tanggal, metode_pembayaran, bukti_pembayaran, status)
          VALUES ('$id_pengajuan', '$jumlah', '$tanggal', '$metode', '$bukti', 'Menunggu Konfirmasi')";

mysqli_query($koneksi, $query);

header("location:riwayat_pengajuan.php");
?>
