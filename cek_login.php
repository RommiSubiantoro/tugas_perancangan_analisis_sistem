<?php
session_start();
$conn = new mysqli("localhost", "root", "", "samsat");

$username = $_POST['username'];
$password = $_POST['password'];

$result = $conn->query("SELECT * FROM admin WHERE username='$username'");
$data = $result->fetch_assoc();

if ($data && password_verify($password, $data['password'])) {
  $_SESSION['admin'] = $data['username'];
  header("Location: admin_dashboard.php");
} else {
  echo "Login gagal. <a href='login.php'>Coba lagi</a>";
}
?>
