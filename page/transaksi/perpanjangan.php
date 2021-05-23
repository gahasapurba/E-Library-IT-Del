<?php

$id = $_GET['id'];
$judul = $_GET['judul'];
$tgl_kembali = $_GET['tgl_kembali'];
$lambat = $_GET['lambat'];

if ($lambat > 7) {
?>
    <script>
        alert('Anda Tidak Bisa Memperpanjang Waktu Peminjaman Buku, Karena Terlanjur Sudah Pernah Terlambat, Silahkan Kembalikan Buku Terlebih Dahulu !');
        window.location.href = "?page=transaksi";
    </script>
    <?php
} else {
    $pecah_tgl_kembali = explode("-", $tgl_kembali);
    $next_7_hari = mktime(0, 0, 0, $pecah_tgl_kembali[1], $pecah_tgl_kembali[0] + 7, $pecah_tgl_kembali[2]);
    $hari_next = date("d-m-Y", $next_7_hari);

    $sql = $koneksi->query("UPDATE tb_transaksi SET tgl_kembali='$hari_next' WHERE id='$id'");

    if ($sql) {
    ?>
        <script>
            alert('Waktu Peminjaman Buku Telah Berhasil Diperpanjang !');
            window.location.href = "?page=transaksi";
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Waktu Peminjaman Buku Gagal Diperpanjang !');
            window.location.href = "?page=transaksi";
        </script>
<?php
    }
}
?>