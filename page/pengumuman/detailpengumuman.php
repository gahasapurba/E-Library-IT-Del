<?php

$id = $_GET['id'];

$sql = $koneksi->query("SELECT * FROM tb_pengumuman WHERE id='$id'");

$tampil = $sql->fetch_assoc();

?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Detail Isi Pengumuman</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="?page=pengumuman">Pengumuman</a></li>
                    <li class="breadcrumb-item active">Detail Isi Pengumuman</li>
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
                        <h3 class="card-title">Berikut Detail Isi Pengumuman</h3>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" class="form-control" value="<?= $tampil['judul']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Isi Pengumuman</label>
                                <textarea class="form-control" rows="10" readonly><?= $tampil['isi']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>File : </label>
                                <a href="file/<?= $tampil['file']; ?>" target="_blank"><?= $tampil['file']; ?></a>
                            </div>
                            <div class="form-group">
                                <label>Waktu Pengiriman Pengumuman</label>
                                <input type="text" class="form-control" value="<?= $tampil['waktuisi']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <a type="button" class="btn btn-secondary" href="?page=pengumuman">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>