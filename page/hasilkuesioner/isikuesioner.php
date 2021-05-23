<?php

$id = $_GET['id'];

$sql = $koneksi->query("SELECT * FROM tb_kuesioner WHERE id='$id'");

$tampil = $sql->fetch_assoc();

?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Detail Isian Kuesioner</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="?page=hasilkuesioner">Hasil Kuesioner</a></li>
                    <li class="breadcrumb-item active">Detail Isian Kuesioner</li>
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
                        <h3 class="card-title">Berikut Detail Isian Kuesioner</h3>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group">
                                <label>NIM</label>
                                <input type="text" class="form-control" value="<?= $tampil['nim']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" value="<?= $tampil['nama']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Prodi</label>
                                <input type="text" class="form-control" value="<?= $tampil['prodi']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <input type="text" class="form-control" value="<?= $tampil['jk']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Jawaban Pertanyaan 1 "Apakah anda merasa terbantu dengan penggunaan aplikasi E-Library IT Del ini ?"</label>
                                <input type="text" class="form-control" value="<?= $tampil['p1']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Jawaban Pertanyaan 2 "Bagaimana menurut anda kelengkapan buku yang terdaftar di E-Library IT Del ini?"</label>
                                <input type="text" class="form-control" value="<?= $tampil['p2']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Saran Dari User</label>
                                <textarea class="form-control" rows="5" readonly><?= $tampil['saran']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Waktu Pengisian Kuesioner</label>
                                <input type="text" class="form-control" value="<?= $tampil['waktuisi']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <a type="button" class="btn btn-primary" href="?page=hasilkuesioner">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>