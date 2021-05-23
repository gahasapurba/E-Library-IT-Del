<?php

$id = $_GET['id'];

$sql = $koneksi->query("UPDATE tb_transaksi SET status='Dipinjam' WHERE id='$id'");

?>

<script>
    alert('Pembayaran Telah Berhasil Dikonfirmasi !');
    window.location.href = "?page=daftarkonfirmasi";
</script>

<?php

?>