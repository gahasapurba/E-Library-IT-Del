<?php

$nim = $_GET['nim'];

$koneksi->query("UPDATE tb_anggota SET level='Admin' WHERE nim='$nim'");
$koneksi->query("UPDATE tb_user SET level='Admin' WHERE nim='$nim'");

?>

<script>
    alert('User Telah Berhasil Dijadikan Admin !');
    window.location.href = "?page=anggota";
</script>