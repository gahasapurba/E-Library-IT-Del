<?php

$sql1 = $koneksi->query("SELECT * FROM tb_buku");
$jumlahbuku = mysqli_num_rows($sql1);

$sql2 = $koneksi->query("SELECT * FROM tb_anggota WHERE level='User'");
$jumlahanggota = mysqli_num_rows($sql2);

$sql3 = $koneksi->query("SELECT * FROM tb_transaksi");
$datatransaksi = mysqli_num_rows($sql3);

$sql4 = $koneksi->query("SELECT * FROM tb_transaksi WHERE nim='$nim' AND status = 'Dipinjam'");
$jumlahbukupinjaman = mysqli_num_rows($sql4);

?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dashboard</h1> <br>
                <p>Hai, <b><?= $namauser; ?></b>. Selamat Datang Di Aplikasi E-Library IT Del</p>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><b>Statistik Perpustakaan</b></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-12 col-lg-4">
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3><?= $jumlahbuku; ?></h3>
                                        <p>Buku Terdaftar</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-ios-book"></i>
                                    </div>
                                    <a href="?page=buku" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4">
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3><?= $jumlahanggota; ?></h3>
                                        <p>Anggota Perpustakaan</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person"></i>
                                    </div>
                                    <?php
                                    if ($_SESSION['SuperAdmin'] || $_SESSION['Admin']) {
                                    ?>
                                        <a href="?page=anggota" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4">
                                <?php
                                if ($_SESSION['SuperAdmin'] || $_SESSION['Admin']) {
                                ?>
                                    <div class="small-box bg-warning">
                                        <div class="inner">
                                            <h3><?= $datatransaksi; ?></h3>
                                            <p>Data Peminjaman Buku</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-bookmark"></i>
                                        </div>
                                        <a href="?page=historitransaksi" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                <?php } else { ?>
                                    <div class="small-box bg-warning">
                                        <div class="inner">
                                            <h3><?= $jumlahbukupinjaman; ?></h3>
                                            <p>Buku Yang Sedang Dipinjam</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-bookmark"></i>
                                        </div>
                                        <a href="?page=transaksi" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><b>Deskripsi Aplikasi</b></h3>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img class="img-fluid" style="width:150px" src="dist/img/itdel.png">
                        </div>

                        <br>
                        <h3 class="profile-username text-center"><b>E-Library IT Del</b></h3>
                        <br>

                        <p class="text-justify">
                            Selamat datang di aplikasi website E-Library Institut Teknologi Del, di website ini nantinya mahasiswa dapat meminjam buku dari perpustakaan tanpa harus mencatat manual di kertas yang biasanya di lakukan selama ini. Mahasiswa juga dapat melihat informasi-informasi dari buku yang ada termasuk stok, lokasi, dan ketersediaan nya. Jadi mahasiswa tidak perlu lagi mencari-cari di rak mana buku tersebut karena data lokasi telah tersedia dan dapat memastikan apakah stok buku yang dicari masih ada atau sedang kosong. Mahasiswa dapat mencetak tanda peminjaman buku dalam bentuk word. Seorang mahasiswa harus mempunyai akun terlebih dahulu untuk mengakses aplikasi ini maka seorang mahasiswa harus meregistrasikan dirinya terlebih dahulu untuk dapat mengakses aplikasi ini. Aplikasi ini juga akan ditangani oleh admin yang merupakan petugas perpustakaan dia dapat menambahkan data data buku yang ada dan dapat melihat data pengguna aplikasi perpustakaan ini. Admin juga dapat mencetak data mahasiswa dan data buku dalam bentuk file excel maupun word.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><b>Profil Diri</b></h3>
                    </div>
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="elevation-3 img-fluid rounded" style="width:150px" src="profileimages/<?= $data['foto']; ?>">
                        </div>
                        <br>

                        <h3 class="profile-username text-center"><b><?= $namauser; ?></b></h3>

                        <?php
                        if ($_SESSION['SuperAdmin']) {
                        ?>
                            <p class="text-muted text-center">Super Administrator E-Library IT Del</p>
                        <?php } else if ($_SESSION['Admin']) { ?>
                            <p class="text-muted text-center">Administrator E-Library IT Del</p>
                        <?php } else { ?>
                            <p class="text-muted text-center">Mahasiswa IT Del</p>
                        <?php } ?>
                        <br>

                        <?php
                        if ($_SESSION['User']) {
                        ?>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>NIM</b> <a class="float-right"><?= $data['nim']; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Prodi</b> <a class="float-right"><?= $data['prodi']; ?></a>
                                </li>
                            </ul>
                        <?php } else { ?>
                            <br><br><br><br><br>
                        <?php } ?>
                        <br>

                        <a href="?page=editprofil" class="btn btn-outline-dark btn-block"><b>Edit Profil</b></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><b>Data Anggota Menurut Prodi</b></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><b>Data Anggota Menurut Jenis Kelamin</b></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>