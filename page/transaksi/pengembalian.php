<?php

$id = $_GET['id'];
$judul = $_GET['judul'];

$sql = $koneksi->query("UPDATE tb_transaksi SET status='Dikembalikan' WHERE id='$id'");

$sql = $koneksi->query("UPDATE tb_buku SET jumlah_buku = (jumlah_buku+1) WHERE judul='$judul'");

?>

<script>
    alert('Buku Telah Berhasil Dikembalikan !');
    window.location.href = "?page=transaksi";
</script>

<?php

?>