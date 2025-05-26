<!DOCTYPE html>
<html>
<head>
  <title>Form Pengajuan Pajak Kendaraan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <div class="card p-4 shadow">
    <h3 class="mb-4">Form Pengajuan Pajak Kendaraan</h3>
    <form method="post" action="simpan_pengajuan.php">
      <div class="mb-3">
        <label class="form-label">Nama Pemilik</label>
        <input type="text" name="nama_pemilik" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Nomor Kendaraan</label>
        <input type="text" name="nomor_kendaraan" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Jenis Kendaraan</label>
        <input type="text" name="jenis_kendaraan" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary">Kirim Pengajuan</button>
    </form>
  </div>
</div>
</body>
</html> 
