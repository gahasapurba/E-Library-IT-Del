<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Buku Pinjaman</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Pinjam Buku</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Berikut Data Peminjaman Anda di Perpustakaan IT Del</h3>
                        <div class="card-tools">
                            <a href="?page=transaksi&aksi=tambah" class="btn btn-primary">
                                Pinjam Buku
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Judul</th>
                                    <th class="text-center">NIM</th>
                                    <th class="text-center">Nama Lengkap</th>
                                    <th class="text-center">Tanggal Pinjam</th>
                                    <th class="text-center">Tanggal Kembali</th>
                                    <th class="text-center">Keterlambatan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $sql = $koneksi->query("SELECT * FROM tb_transaksi WHERE nim='$nim' AND status='Dipinjam' OR status='Terlambat (Belum Bayar)' OR status='Terlambat (Sudah Bayar)'");
                                while ($data = $sql->fetch_assoc()) {
                                ?>

                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td><?= $data['judul']; ?></td>
                                        <td class="text-center"><?= $data['nim']; ?></td>
                                        <td><?= $data['nama']; ?></td>
                                        <td class="text-center"><?= $data['tgl_pinjam']; ?></td>
                                        <td class="text-center"><?= $data['tgl_kembali']; ?></td>
                                        <td class="text-center">
                                            <?php

                                            $denda = 1000;

                                            $tgl_dateline2 = $data['tgl_kembali'];
                                            $tgl_kembali = date('Y-m-d');

                                            $lambat = terlambat($tgl_dateline2, $tgl_kembali);
                                            $denda1 = $lambat * $denda;

                                            if ($lambat > 0) {
                                                echo "
                                                    <font color='red'>$lambat Hari<br>(Rp $denda1)</font>
                                                ";
                                                $koneksi->query("UPDATE tb_transaksi SET status='Terlambat (Belum Bayar)' WHERE id='$id'");
                                            } else {
                                                echo $lambat . " Hari";
                                            }

                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($lambat > 0) { ?>
                                                <a href="?page=transaksi&aksi=bayar&id=<?= $data['id']; ?>&judul=<?= $data['judul']; ?>" class="btn btn-outline-danger">Bayar Denda</a>
                                            <?php } else if ($data['status'] == 'Dipinjam') { ?>
                                                <a href="?page=transaksi&aksi=kembali&id=<?= $data['id']; ?>&judul=<?= $data['judul']; ?>" class="btn btn-outline-success">Kembalikan</a>
                                                <a href="?page=transaksi&aksi=perpanjang&id=<?= $data['id']; ?>&judul=<?= $data['judul']; ?>&lambat=<?= $lambat; ?>&tgl_kembali=<?= $data['tgl_kembali']; ?>" class="btn btn-outline-info">Perpanjang</a>
                                            <?php } else if ($data['status'] == 'Terlambat (Sudah Bayar)') { ?>
                                                <p>Menunggu Konfirmasi Pembayaran</p>
                                            <?php } ?>
                                        </td>
                                    </tr>

                                <?php } ?>
                            </tbody>
                        </table>
                        <a href="laporan/laporan_transaksi_word.php" target="blank" class="btn btn-default">
                            <i class="fa fa-print"></i>
                            Print Bukti Peminjaman
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>