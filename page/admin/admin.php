<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Admin</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Admin</li>
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
                        <h3 class="card-title">Berikut Data Admin Yang Terdaftar di Perpustakaan IT Del</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama Lengkap</th>
                                    <th class="text-center">Tempat Lahir</th>
                                    <th class="text-center">Tanggal Lahir</th>
                                    <th class="text-center">Jenis Kelamin</th>
                                    <th class="text-center">Foto</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $sql = $koneksi->query("SELECT * FROM tb_anggota WHERE level='Admin'");
                                while ($data = $sql->fetch_assoc()) {
                                ?>

                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td><?= $data['nama']; ?></td>
                                        <td><?= $data['tempat_lahir']; ?></td>
                                        <td class="text-center"><?= $data['tgl_lahir']; ?></td>
                                        <td class="text-center"><?= $data['jk']; ?></td>
                                        <td class="text-center">
                                            <img src="profileimages/<?= $data['foto']; ?>" style="width: 100px">
                                        </td>
                                        <td class="text-center">
                                            <a href="?page=admin&aksi=hapus&nim=<?= $data['nim']; ?>" class="btn btn-outline-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?');">Hapus</a>
                                            <a href="?page=admin&aksi=edit&nim=<?= $data['nim']; ?>" class="btn btn-outline-success" onclick="return confirm('Apakah Anda Yakin Ingin Menjadikan User Ini Sebagai Anggota ?');">Jadikan Anggota</a>
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