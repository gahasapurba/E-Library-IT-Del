<?php error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); ?>

<?php

session_start();

$koneksi = new mysqli("localhost", "u969920341_library", "Library123456", "u969920341_library");

$filename = "Bukti_Peminjaman-(" . date('d-m-Y') . ").doc";

header("content-type: application/vdn.ms-word");
header("content-disposition: attachment; filename=$filename");

?>

<?php

if ($_SESSION['Admin']) {
    $user = $_SESSION['Admin'];
} else if ($_SESSION['User']) {
    $user = $_SESSION['User'];
}

$sql = $koneksi->query("SELECT * FROM tb_user WHERE id='$user'");

$data = $sql->fetch_assoc();

$id = $data['id'];
$nim = $data['nim'];
$namauser = $data['nama'];
$fotoprofil = $data['foto'];

?>

<h2>Bukti Peminjaman</h2>

<table border="1">
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Judul</th>
            <th class="text-center">NIM</th>
            <th class="text-center">Nama Lengkap</th>
            <th class="text-center">Tanggal Pinjam</th>
            <th class="text-center">Tanggal Kembali</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $sql = $koneksi->query("SELECT * FROM tb_transaksi WHERE status='Dipinjam' AND nim='$nim'");
        while ($data = $sql->fetch_assoc()) {
        ?>

            <tr>
                <td class="text-center"><?= $no++; ?></td>
                <td><?= $data['judul']; ?></td>
                <td class="text-center"><?= $data['nim']; ?></td>
                <td><?= $data['nama']; ?></td>
                <td class="text-center"><?= $data['tgl_pinjam']; ?></td>
                <td class="text-center"><?= $data['tgl_kembali']; ?></td>
            </tr>

        <?php } ?>
    </tbody>
</table>
<p>Silahkan Ambil Buku Ke Perpustakaan, Dengan Menunjukkan Bukti Peminjaman Ini</p>