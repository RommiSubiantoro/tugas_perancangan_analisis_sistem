<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: login_admin.php");
    exit;
}

$conn = new mysqli("localhost", "root", "", "samsat");

// Ambil daftar pengguna
$sql_users = "SELECT * FROM users";
$result_users = $conn->query($sql_users);

if (isset($_GET['delete_user'])) {
    $user_id = $_GET['delete_user'];

    // Hapus pengguna berdasarkan ID
    $sql_delete = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql_delete);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();

    // Setelah penghapusan, redirect kembali ke halaman user management
    header("Location: user_management.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management - Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 bg-dark text-white p-3">
                <h4>Dashboard Admin</h4>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="dashboard_admin.php" class="nav-link text-white">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="konfirmasi_pengajuan.php" class="nav-link text-white">Pengajuan Pajak</a>
                    </li>
                    <li class="nav-item">
                        <a href="pembayaran_admin.php" class="nav-link text-white">Pembayaran</a>
                    </li>
                    <li class="nav-item">
                        <a href="user_management.php" class="nav-link text-white">User Management</a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link text-white">Logout</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9">
                <h2 class="mt-4">User Management</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result_users->fetch_assoc()): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['email']) ?></td>
                                <td>
                                    <a href="view_user.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">Lihat</a>
                                    <a href="user_management.php?delete_user=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
