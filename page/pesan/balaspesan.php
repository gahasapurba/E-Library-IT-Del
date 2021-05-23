<?php

$id = $_GET['id'];

$sql = $koneksi->query("SELECT * FROM tb_pesanmasuk WHERE id='$id'");

$tampil = $sql->fetch_assoc();

?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Balas Pesan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="?page=pesan&aksi=masuk">Pesan Masuk</a></li>
                    <li class="breadcrumb-item active">Balas Pesan</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Silahkan Balas Pesan Yang Anda Terima</h3>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group">
                                <label>Penerima</label>
                                <input name="penerima" type="text" class="form-control" value="<?= $tampil['pengirim']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Isi Pesan</label>
                                <textarea name="isipesan" class="form-control" rows="5" placeholder="Masukkan Isi Pesan" required></textarea>
                            </div>
                            <div class="form-group">
                                <a type="button" class="btn btn-secondary" href="?page=pesan&aksi=masuk">Batal</a>
                                <button type="submit" name="kirim" class="btn btn-primary">Kirim Pesan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<?php

if (isset($_POST['kirim'])) {

    $penerima = $_POST['penerima'];
    $isipesan = $_POST['isipesan'];

    $sql1 = $koneksi->query("INSERT INTO tb_pesanmasuk (pengirim, penerima, levelpengirim, fotopengirim, isipesan)VALUES('$namauser', '$penerima', '$leveluser', '$fotoprofil', '$isipesan')");
    $sql2 = $koneksi->query("INSERT INTO tb_pesanterkirim (pengirim, penerima, isipesan)VALUES('$namauser', '$penerima', '$isipesan')");

    if ($sql1 && $sql2) {
?>
        <script>
            alert('Pesan Berhasil Terkirim !');
            window.location.href = "?page=pesan&aksi=terkirim";
        </script>
<?php
    }
}

?>