<?php

$nim = $_GET['nim'];

$koneksi->query("UPDATE tb_anggota SET level='User' WHERE nim='$nim'");
$koneksi->query("UPDATE tb_user SET level='User' WHERE nim='$nim'");

?>

<script>
    alert('User Telah Berhasil Dijadikan Anggota !');
    window.location.href = "?page=admin";
</script>