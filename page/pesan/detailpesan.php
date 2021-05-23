<?php

$id = $_GET['id'];

$sql = $koneksi->query("SELECT * FROM tb_pesanmasuk WHERE id='$id'");

$tampil = $sql->fetch_assoc();

?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Detail Isi Pesan Masuk</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="?page=pesan&aksi=masuk">Pesan Masuk</a></li>
                    <li class="breadcrumb-item active">Detail Isi Pesan Masuk</li>
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
                        <h3 class="card-title">Berikut Detail Isi Pesan Yang Anda Terima</h3>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group">
                                <label>Nama Pengirim</label>
                                <input type="text" class="form-control" value="<?= $tampil['pengirim']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Status Pengirim</label>
                                <input type="text" class="form-control" value="<?= $tampil['levelpengirim']; ?>" readonly>
                            </div>
                            <div class="form-group mb-3">
                                <label>Foto Pengirim</label><br>
                                <img src="profileimages/<?= $tampil['fotopengirim']; ?>" class="elevation-5 img-fluid rounded" style="width: 200px"><br><br>
                            </div>
                            <div class="form-group">
                                <label>Isi Pesan</label>
                                <textarea class="form-control" rows="5" readonly><?= $tampil['isipesan']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Waktu Pengiriman Pesan</label>
                                <input type="text" class="form-control" value="<?= $tampil['waktupengiriman']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <a type="button" class="btn btn-secondary" href="?page=pesan&aksi=masuk">Kembali</a>
                            </div>
                            <div class="form-group">
                                <a type="button" class="btn btn-primary" href="?page=pesan&aksi=balas&id=<?= $id; ?>">Balas Pesan</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>