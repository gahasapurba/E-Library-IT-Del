<?php

$id = $_GET['id'];
$judul = $_GET['judul'];

$sql = $koneksi->query("UPDATE tb_transaksi SET status='Terlambat (Sudah Bayar)' WHERE id='$id'");

?>

<script>
    alert('Anda Telah Membayar Denda, Silahkan Menunggu Konfirmasi Pembayaran, Lalu Kembalikan Buku !');
    window.location.href = "?page=transaksi";
</script>

<?php

?>