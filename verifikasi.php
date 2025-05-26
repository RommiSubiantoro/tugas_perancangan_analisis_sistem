<?php
$conn = new mysqli("localhost", "root", "", "samsat");
$id = $_GET['id'];
$status = $_GET['status'];

$conn->query("UPDATE pengajuan SET status='$status' WHERE id=$id");
header("Location: admin_dashboard.php");
?>
