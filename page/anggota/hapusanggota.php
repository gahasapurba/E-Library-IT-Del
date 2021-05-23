<?php

$nim = $_GET['nim'];

$koneksi->query("DELETE FROM tb_anggota WHERE nim='$nim'");
$koneksi->query("DELETE FROM tb_user WHERE nim='$nim'");

?>

<script>
    alert('Data Berhasil Dihapus !');
    window.location.href = "?page=anggota";
</script>