<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Pajak</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .hero {
            background-image: url('samsat.jpg');
            background-size: cover;
            background-position: center;
            height: 60vh;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.7);
        }
        .feature-icon {
            font-size: 40px;
            color: #0d6efd;
        }
        footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
        }
    </style>
    <style>
    .feature-icon {
        font-size: 40px;
        color: #0d6efd;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    .card {
        transition: all 0.3s ease; /* supaya animasinya halus */
    }
</style>

</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">Pajak Online</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Informasi</a></li>
                <li class="nav-item"><a class="nav-link" href="form_pembayaran.php">Bayar Pajak</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Saran & Kritik</a></li>
                <li class="nav-item"><a class="nav-link" href="index_login.php">Login</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- HERO IMAGE -->
<div class="hero text-center">
    <div>
        <h1>Selamat Datang di Website Pajak 5 Tahunan</h1>
        <p>Kelola data admin, user, dan transaksi pajak dengan mudah dan cepat.</p>
    </div>
</div>

<!-- FITUR UTAMA -->
<!-- FITUR UTAMA -->
<div class="container my-5">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <!-- Fitur 1 -->
        <div class="col">
            <div class="card h-100 text-center border-primary">
                <div class="card-body">
                    <div class="feature-icon mb-3">
                        <i class="bi bi-person-lines-fill"></i>
                    </div>
                    <h5 class="card-title">Kelola Pengguna</h5>
                    <p class="card-text">Admin dapat mengelola data pengguna dengan mudah dan cepat.</p>
                </div>
            </div>
        </div>
        <!-- Fitur 2 -->
        <div class="col">
            <div class="card h-100 text-center border-success">
                <div class="card-body">
                    <div class="feature-icon mb-3">
                        <i class="bi bi-cash-coin"></i>
                    </div>
                    <h5 class="card-title">Transaksi Aman</h5>
                    <p class="card-text">Proses pembayaran pajak dilakukan secara aman dan transparan.</p>
                </div>
            </div>
        </div>
        <!-- Fitur 3 -->
        <div class="col">
            <div class="card h-100 text-center border-warning">
                <div class="card-body">
                    <div class="feature-icon mb-3">
                        <i class="bi bi-printer"></i>
                    </div>
                    <h5 class="card-title">Struk Digital</h5>
                    <p class="card-text">Setelah pembayaran diverifikasi, struk dapat langsung diunduh.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FOOTER -->
<footer class="text-center">
    <div class="container">
        <p class="mb-0">© Samsat Makassar II</p>
    </div>
</footer>

<!-- ICONS + SCRIPT -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
