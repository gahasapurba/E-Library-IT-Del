<?php

$id = $_GET['id'];

$koneksi->query("DELETE FROM tb_pesanmasuk WHERE id='$id'");
$koneksi->query("DELETE FROM tb_pesanterkirim WHERE id='$id'");

?>

<script>
    alert('Pesan Berhasil Dihapus !');
    window.location.href = "?page=pesan&aksi=terkirim";
</script>