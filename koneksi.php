<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "samsat"; // ganti dengan nama database kamu

$conn = mysqli_connect($host, $user, $pass, $db);

if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit;
}
?>
