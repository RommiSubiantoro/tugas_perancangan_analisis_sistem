<?php
include 'koneksi.php';
$id = $_GET['id'];
$status = $_GET['status'];

mysqli_query($koneksi, "UPDATE pembayaran SET status='$status' WHERE id='$id'");
header("location:admin_pembayaran.php");
?>
