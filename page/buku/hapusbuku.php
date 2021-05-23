<?php

$id = $_GET['id'];

$koneksi->query("DELETE FROM tb_buku WHERE id='$id'");

?>

<script>
    alert('Data Berhasil Dihapus !');
    window.location.href = "?page=buku";
</script>