<?php error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); ?>

<?php

session_start();

if ($_SESSION['SuperAdmin'] || $_SESSION['Admin'] || $_SESSION['User']) {

    include "function.php";

    $koneksi = new mysqli("localhost", "u969920341_library", "Library123456", "u969920341_library");

?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>E-Library IT Del</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
        <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="dist/css/adminlte.min.css">
        <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
        <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>

    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                    <?php
                    if ($_SESSION['SuperAdmin']) {
                    ?>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="index.php" class="nav-link">Dashboard</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="?page=anggota" class="nav-link">Anggota</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="?page=admin" class="nav-link">Admin</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="?page=buku" class="nav-link">Buku</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="?page=pengumuman" class="nav-link">Pengumuman</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="?page=konfirmasipembayaran" class="nav-link">Konfirmasi Pembayaran</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="?page=historitransaksi" class="nav-link">Peminjaman</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="?page=pesan&aksi=masuk" class="nav-link">Pesan Masuk</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="?page=pesan&aksi=terkirim" class="nav-link">Pesan Terkirim</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="?page=editprofil" class="nav-link">Edit Profil</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="?page=hasilkuesioner" class="nav-link">Hasil Kuesioner</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="?page=about" class="nav-link">About</a>
                        </li>
                    <?php
                    } else if ($_SESSION['Admin']) {
                    ?>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="index.php" class="nav-link">Dashboard</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="?page=anggota" class="nav-link">Anggota</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="?page=buku" class="nav-link">Buku</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="?page=pengumuman" class="nav-link">Pengumuman</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="?page=konfirmasipembayaran" class="nav-link">Konfirmasi Pembayaran</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="?page=historitransaksi" class="nav-link">Peminjaman</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="?page=pesan&aksi=masuk" class="nav-link">Pesan Masuk</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="?page=pesan&aksi=terkirim" class="nav-link">Pesan Terkirim</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="?page=editprofil" class="nav-link">Edit Profil</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="?page=hasilkuesioner" class="nav-link">Hasil Kuesioner</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="?page=about" class="nav-link">About</a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="index.php" class="nav-link">Dashboard</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="?page=buku" class="nav-link">Buku</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="?page=pengumuman" class="nav-link">Pengumuman</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="?page=transaksi" class="nav-link">Pinjam Buku</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="?page=pesan&aksi=masuk" class="nav-link">Pesan Masuk</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="?page=pesan&aksi=terkirim" class="nav-link">Pesan Terkirim</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="?page=editprofil" class="nav-link">Edit Profil</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="?page=kuesioner" class="nav-link">Kuesioner</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="?page=about" class="nav-link">About</a>
                        </li>
                    <?php } ?>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="logout.php" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Logout ?');">Log Out</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                            <i class="fas fa-th-large"></i>
                        </a>
                    </li>
                </ul>
            </nav>

            <?php

            if ($_SESSION['SuperAdmin']) {
                $user = $_SESSION['SuperAdmin'];
            } else if ($_SESSION['Admin']) {
                $user = $_SESSION['Admin'];
            } else if ($_SESSION['User']) {
                $user = $_SESSION['User'];
            }

            $sql = $koneksi->query("SELECT * FROM tb_user WHERE id='$user'");

            $data = $sql->fetch_assoc();

            $id = $data['id'];
            $nim = $data['nim'];
            $leveluser = $data['level'];
            $namauser = $data['nama'];
            $jeniskelaminuser = $data['jk'];
            $prodiuser = $data['prodi'];
            $fotoprofil = $data['foto'];

            ?>

            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <a href="index.php" class="brand-link">
                    <img src="dist/img/itdel.png" class="brand-image elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">E-Library IT Del</span>
                </a>

                <div class="sidebar">
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="info text-center">
                            <div class="image">
                                <img src="profileimages/<?= $data['foto']; ?>" style="width: 80px" class="img-fluid rounded-circle elevation-5">
                            </div>
                            <br><br>
                            <a href="#" class="d-block"><?= $data['nama']; ?></a>
                            <?php
                            if ($_SESSION['SuperAdmin']) {
                            ?>
                                <a href="#" class="d-block">- Super Administrator -</a>
                            <?php
                            } else if ($_SESSION['Admin']) {
                            ?>
                                <a href="#" class="d-block">- Administrator -</a>
                            <?php } else { ?>
                                <a href="#" class="d-block">- Mahasiswa -</a>
                            <?php } ?>
                        </div>
                    </div>

                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <?php
                            if ($_SESSION['SuperAdmin']) {
                            ?>
                                <li class="nav-item">
                                    <a href="index.php" class="nav-link">
                                        <i class="nav-icon fas fa-tachometer-alt"></i>
                                        <p>
                                            Dashboard
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?page=anggota" class="nav-link">
                                        <i class="nav-icon fas fa-users"></i>
                                        <p>
                                            Anggota
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?page=admin" class="nav-link">
                                        <i class="nav-icon fas fa-key"></i>
                                        <p>
                                            Admin
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?page=buku" class="nav-link">
                                        <i class="nav-icon fas fa-book"></i>
                                        <p>
                                            Buku
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?page=pengumuman" class="nav-link">
                                        <i class="nav-icon fas fa-bell"></i>
                                        <p>
                                            Pengumuman
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?page=konfirmasipembayaran" class="nav-link">
                                        <i class="nav-icon fas fa-money-bill-wave"></i>
                                        <p>
                                            Konfirmasi Pembayaran
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?page=historitransaksi" class="nav-link">
                                        <i class="nav-icon fas fa-bookmark"></i>
                                        <p>
                                            Peminjaman
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?page=pesan&aksi=masuk" class="nav-link">
                                        <i class="nav-icon fas fa-envelope-open"></i>
                                        <p>
                                            Pesan Masuk
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?page=pesan&aksi=terkirim" class="nav-link">
                                        <i class="nav-icon fas fa-envelope"></i>
                                        <p>
                                            Pesan Terkirim
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?page=editprofil" class="nav-link">
                                        <i class="nav-icon fas fa-user"></i>
                                        <p>
                                            Edit Profil
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?page=hasilkuesioner" class="nav-link">
                                        <i class="nav-icon fas fa-pen"></i>
                                        <p>
                                            Hasil Kuesioner
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?page=about" class="nav-link">
                                        <i class="nav-icon fas fa-address-card"></i>
                                        <p>
                                            About
                                        </p>
                                    </a>
                                </li>
                            <?php
                            } else if ($_SESSION['Admin']) {
                            ?>
                                <li class="nav-item">
                                    <a href="index.php" class="nav-link">
                                        <i class="nav-icon fas fa-tachometer-alt"></i>
                                        <p>
                                            Dashboard
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?page=anggota" class="nav-link">
                                        <i class="nav-icon fas fa-users"></i>
                                        <p>
                                            Anggota
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?page=buku" class="nav-link">
                                        <i class="nav-icon fas fa-book"></i>
                                        <p>
                                            Buku
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?page=pengumuman" class="nav-link">
                                        <i class="nav-icon fas fa-bell"></i>
                                        <p>
                                            Pengumuman
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?page=konfirmasipembayaran" class="nav-link">
                                        <i class="nav-icon fas fa-money-bill-wave"></i>
                                        <p>
                                            Konfirmasi Pembayaran
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?page=historitransaksi" class="nav-link">
                                        <i class="nav-icon fas fa-bookmark"></i>
                                        <p>
                                            Peminjaman
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?page=pesan&aksi=masuk" class="nav-link">
                                        <i class="nav-icon fas fa-envelope-open"></i>
                                        <p>
                                            Pesan Masuk
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?page=pesan&aksi=terkirim" class="nav-link">
                                        <i class="nav-icon fas fa-envelope"></i>
                                        <p>
                                            Pesan Terkirim
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?page=editprofil" class="nav-link">
                                        <i class="nav-icon fas fa-user"></i>
                                        <p>
                                            Edit Profil
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?page=hasilkuesioner" class="nav-link">
                                        <i class="nav-icon fas fa-pen"></i>
                                        <p>
                                            Hasil Kuesioner
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?page=about" class="nav-link">
                                        <i class="nav-icon fas fa-address-card"></i>
                                        <p>
                                            About
                                        </p>
                                    </a>
                                </li>
                            <?php
                            } else {
                            ?>
                                <li class="nav-item">
                                    <a href="index.php" class="nav-link">
                                        <i class="nav-icon fas fa-tachometer-alt"></i>
                                        <p>
                                            Dashboard
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?page=buku" class="nav-link">
                                        <i class="nav-icon fas fa-book"></i>
                                        <p>
                                            Buku
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?page=pengumuman" class="nav-link">
                                        <i class="nav-icon fas fa-bell"></i>
                                        <p>
                                            Pengumuman
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?page=transaksi" class="nav-link">
                                        <i class="nav-icon fas fa-bookmark"></i>
                                        <p>
                                            Pinjam Buku
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?page=pesan&aksi=masuk" class="nav-link">
                                        <i class="nav-icon fas fa-envelope-open"></i>
                                        <p>
                                            Pesan Masuk
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?page=pesan&aksi=terkirim" class="nav-link">
                                        <i class="nav-icon fas fa-envelope"></i>
                                        <p>
                                            Pesan Terkirim
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?page=editprofil" class="nav-link">
                                        <i class="nav-icon fas fa-user"></i>
                                        <p>
                                            Edit Profil
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?page=kuesioner" class="nav-link">
                                        <i class="nav-icon fas fa-pen"></i>
                                        <p>
                                            Kuesioner
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?page=about" class="nav-link">
                                        <i class="nav-icon fas fa-address-card"></i>
                                        <p>
                                            About
                                        </p>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </nav>
                </div>
            </aside>

            <div class="content-wrapper">
                <?php

                $page = $_GET['page'];
                $aksi = $_GET['aksi'];

                if ($page == "buku") {
                    if ($aksi == "") {
                        include "page/buku/buku.php";
                    } else if ($aksi == "tambah") {
                        include "page/buku/tambahbuku.php";
                    } else if ($aksi == "edit") {
                        include "page/buku/editbuku.php";
                    } else if ($aksi == "hapus") {
                        include "page/buku/hapusbuku.php";
                    }
                } else if ($page == "pengumuman") {
                    if ($aksi == "") {
                        include "page/pengumuman/pengumuman.php";
                    } else if ($aksi == "tambah") {
                        include "page/pengumuman/tambahpengumuman.php";
                    } else if ($aksi == "edit") {
                        include "page/pengumuman/editpengumuman.php";
                    } else if ($aksi == "hapus") {
                        include "page/pengumuman/hapuspengumuman.php";
                    } else if ($aksi == "detail") {
                        include "page/pengumuman/detailpengumuman.php";
                    }
                } else if ($page == "anggota") {
                    if ($aksi == "") {
                        include "page/anggota/anggota.php";
                    } else if ($aksi == "edit") {
                        include "page/anggota/editanggota.php";
                    } else if ($aksi == "hapus") {
                        include "page/anggota/hapusanggota.php";
                    }
                } else if ($page == "admin") {
                    if ($aksi == "") {
                        include "page/admin/admin.php";
                    } else if ($aksi == "edit") {
                        include "page/admin/editadmin.php";
                    } else if ($aksi == "hapus") {
                        include "page/admin/hapusadmin.php";
                    }
                } else if ($page == "transaksi") {
                    if ($aksi == "") {
                        include "page/transaksi/transaksi.php";
                    } else if ($aksi == "tambah") {
                        include "page/transaksi/tambahtransaksi.php";
                    } else if ($aksi == "kembali") {
                        include "page/transaksi/pengembalian.php";
                    } else if ($aksi == "perpanjang") {
                        include "page/transaksi/perpanjangan.php";
                    } else if ($aksi == "bayar") {
                        include "page/transaksi/bayar.php";
                    }
                } else if ($page == "pesan") {
                    if ($aksi == "masuk") {
                        include "page/pesan/pesanmasuk.php";
                    } else if ($aksi == "terkirim") {
                        include "page/pesan/pesanterkirim.php";
                    } else if ($aksi == "tambah") {
                        include "page/pesan/tambahpesan.php";
                    } else if ($aksi == "detail") {
                        include "page/pesan/detailpesan.php";
                    } else if ($aksi == "balas") {
                        include "page/pesan/balaspesan.php";
                    } else if ($aksi == "edit") {
                        include "page/pesan/editpesan.php";
                    } else if ($aksi == "hapus") {
                        include "page/pesan/hapuspesan.php";
                    }
                } else if ($page == "konfirmasipembayaran") {
                    if ($aksi == "") {
                        include "page/konfirmasipembayaran/daftarkonfirmasi.php";
                    } else if ($aksi == "konfirmasi") {
                        include "page/konfirmasipembayaran/konfirmasi.php";
                    }
                } else if ($page == "historitransaksi") {
                    if ($aksi == "") {
                        include "page/historitransaksi/historitransaksi.php";
                    } else if ($aksi == "hapus") {
                        include "page/historitransaksi/hapushistoritransaksi.php";
                    }
                } else if ($page == "") {
                    include "home.php";
                } else if ($page == "about") {
                    if ($aksi == "") {
                        include "page/about/about.php";
                    }
                } else if ($page == "editprofil") {
                    if ($aksi == "") {
                        include "page/editprofil/editprofil.php";
                    }
                } else if ($page == "kuesioner") {
                    if ($aksi == "") {
                        include "page/kuesioner/kuesioner.php";
                    }
                } else if ($page == "hasilkuesioner") {
                    if ($aksi == "") {
                        include "page/hasilkuesioner/hasilkuesioner.php";
                    } else if ($aksi == "detail") {
                        include "page/hasilkuesioner/isikuesioner.php";
                    } else if ($aksi == "hapus") {
                        include "page/hasilkuesioner/hapuskuesioner.php";
                    }
                }

                ?>
            </div>

            <footer class="main-footer">
                <div class="float-right d-none d-sm-block">
                    <b>Version</b> 1.0.0
                </div>
                <strong>Copyright &copy; 2020 E-Library <a href="https://www.del.ac.id/">Institut Teknologi Del</a>.</strong> All rights
                reserved.
            </footer>

            <aside class="control-sidebar control-sidebar-dark">
            </aside>
        </div>

        <script src="plugins/jquery/jquery.min.js"></script>
        <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="plugins/chart.js/Chart.min.js"></script>
        <script src="plugins/sparklines/sparkline.js"></script>
        <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
        <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
        <script src="plugins/moment/moment.min.js"></script>
        <script src="plugins/daterangepicker/daterangepicker.js"></script>
        <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="plugins/summernote/summernote-bs4.min.js"></script>
        <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <script src="plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="dist/js/adminlte.js"></script>
        <script src="dist/js/pages/dashboard.js"></script>
        <script src="dist/js/demo.js"></script>
        <script>
            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "autoWidth": false,
                });
            });
        </script>

        <?php

        $sql1 = $koneksi->query("SELECT * FROM tb_anggota WHERE jk='L' AND level='User'");
        $lakilaki = mysqli_num_rows($sql1);

        $sql2 = $koneksi->query("SELECT * FROM tb_anggota WHERE jk='P' AND level='User'");
        $perempuan = mysqli_num_rows($sql2);

        $sql3 = $koneksi->query("SELECT * FROM tb_anggota WHERE prodi='D3 Teknologi Komputer' AND level='User'");
        $d3tk = mysqli_num_rows($sql3);

        $sql4 = $koneksi->query("SELECT * FROM tb_anggota WHERE prodi='D3 Teknologi Informasi' AND level='User'");
        $d3ti = mysqli_num_rows($sql4);

        $sql5 = $koneksi->query("SELECT * FROM tb_anggota WHERE prodi='D4 Teknologi Rekayasa Perangkat Lunak' AND level='User'");
        $d4trpl = mysqli_num_rows($sql5);

        $sql6 = $koneksi->query("SELECT * FROM tb_anggota WHERE prodi='S1 Informatika' AND level='User'");
        $s1if = mysqli_num_rows($sql6);

        $sql7 = $koneksi->query("SELECT * FROM tb_anggota WHERE prodi='S1 Sistem Informasi' AND level='User'");
        $s1si = mysqli_num_rows($sql7);

        $sql8 = $koneksi->query("SELECT * FROM tb_anggota WHERE prodi='S1 Teknik Elektro' AND level='User'");
        $s1te = mysqli_num_rows($sql8);

        $sql9 = $koneksi->query("SELECT * FROM tb_anggota WHERE prodi='S1 Manajemen Rekayasa' AND level='User'");
        $s1mr = mysqli_num_rows($sql9);

        $sql10 = $koneksi->query("SELECT * FROM tb_anggota WHERE prodi='S1 Teknik Bioproses' AND level='User'");
        $s1tb = mysqli_num_rows($sql10);

        echo "
        <script>
            $(function() {
                // Data
                var prodi = {
                    labels: [
                        'D3 TK',
                        'D3 TI',
                        'D4 TRPL',
                        'S1 IF',
                        'S1 SI',
                        'S1 TE',
                        'S1 MR',
                        'S1 TB',
                    ],
                    datasets: [{
                        data: [$d3tk, $d3ti, $d4trpl, $s1if, $s1si, $s1te, $s1mr, $s1tb],
                        backgroundColor: ['#0fb9b1', '#fa8231', '#00a8ff', '#3867d6', '#4b6584', '#fbc531', '#c23616', '#44bd32'],
                    }]
                }
                
                var jeniskelamin = {
                    labels: [
                        'Laki - laki',
                        'Perempuan',
                    ],
                    datasets: [{
                        data: [$lakilaki, $perempuan],
                        backgroundColor: ['#273c75', '#e84118'],
                    }]
                }

                //-------------
                //- PIE CHART -
                //-------------
                var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
                var pieData = prodi;

                var pieOptions = {
                    maintainAspectRatio: false,
                    responsive: true,
                }

                var pieChart = new Chart(pieChartCanvas, {
                    type: 'pie',
                    data: pieData,
                    options: pieOptions
                })

                //-------------
                //- BAR CHART -
                //-------------
                var barChartCanvas = $('#barChart').get(0).getContext('2d')
                var barChartData = jeniskelamin;

                var barChartOptions = {
                    responsive: true,
                    maintainAspectRatio: false,
                    datasetFill: false
                }

                var barChart = new Chart(barChartCanvas, {
                    type: 'bar',
                    data: barChartData,
                    options: barChartOptions
                })
            })
        </script>
        ";

        ?>
    </body>

    </html>

<?php

} else {
    header("location:login.php");
}

?>