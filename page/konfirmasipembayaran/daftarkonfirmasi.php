<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Konfirmasi Pembayaran Denda Buku</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Konfirmasi Pembayaran</li>
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
                        <h3 class="card-title">Berikut Denda Peminjaman Buku Yang Telah Dibayar di Perpustakaan IT Del</h3>
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
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $sql = $koneksi->query("SELECT * FROM tb_transaksi WHERE status='Terlambat (Sudah Bayar)'");
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
                                            } else {
                                                echo $lambat . " Hari";
                                            }

                                            ?>
                                        </td>
                                        <td><?= $data['status']; ?></td>
                                        <td class="text-center">
                                            <a href="?page=konfirmasipembayaran&aksi=konfirmasi&id=<?= $data['id']; ?>" class="btn btn-outline-info">Konfirmasi</a>
                                        </td>
                                    </tr>

                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>