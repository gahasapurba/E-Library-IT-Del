<?php

$id = $_GET['id'];

$sql = $koneksi->query("DELETE FROM tb_transaksi WHERE id='$id'");

?>

<script>
    alert('Data Berhasil Dihapus !');
    window.location.href = "?page=historitransaksi";
</script>