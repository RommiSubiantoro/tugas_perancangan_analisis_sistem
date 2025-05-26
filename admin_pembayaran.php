<?php
include 'koneksi.php';
$data = mysqli_query($koneksi, "SELECT * FROM pembayaran");
?>

<h2>Data Pembayaran</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>ID Pengajuan</th>
        <th>Jumlah</th>
        <th>Tanggal</th>
        <th>Metode</th>
        <th>Bukti</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    <?php while($d = mysqli_fetch_array($data)) { ?>
    <tr>
        <td><?= $d['id'] ?></td>
        <td><?= $d['id_pengajuan'] ?></td>
        <td><?= $d['jumlah'] ?></td>
        <td><?= $d['tanggal'] ?></td>
        <td><?= $d['metode_pembayaran'] ?></td>
        <td><a href="bukti/<?= $d['bukti_pembayaran'] ?>" target="_blank">Lihat Bukti</a></td>
        <td><?= $d['status'] ?></td>
        <td>
            <?php if ($d['status'] == 'Menunggu Konfirmasi') { ?>
                <a href="verifikasi_pembayaran.php?id=<?= $d['id'] ?>&status=Disetujui">Setujui</a> |
                <a href="verifikasi_pembayaran.php?id=<?= $d['id'] ?>&status=Ditolak">Tolak</a>
            <?php } else { echo "-"; } ?>
        </td>
    </tr>
    <?php } ?>
</table>
