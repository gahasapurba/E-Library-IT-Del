<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Hasil Kuesioner</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Hasil Kuesioner</li>
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
                        <h3 class="card-title">Berikut Data Hasil Kuesioner Yang Telah Diisi Pengguna E-Library IT Del</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">NIM</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Prodi</th>
                                    <th class="text-center">Jenis Kelamin</th>
                                    <th class="text-center">Waktu Isi</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $sql = $koneksi->query("SELECT * FROM tb_kuesioner");
                                while ($data = $sql->fetch_assoc()) {
                                ?>

                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td class="text-center"><?= $data['nim']; ?></td>
                                        <td><?= $data['nama']; ?></td>
                                        <td><?= $data['prodi']; ?></td>
                                        <td class="text-center"><?= $data['jk']; ?></td>
                                        <td class="text-center"><?= $data['waktuisi']; ?></td>
                                        <td class="text-center">
                                            <a href="?page=hasilkuesioner&aksi=detail&id=<?= $data['id']; ?>" class="btn btn-outline-primary">Lihat Detail Isian</a>
                                            <a href="?page=hasilkuesioner&aksi=hapus&id=<?= $data['id']; ?>" class="btn btn-outline-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?');">Hapus</a>
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