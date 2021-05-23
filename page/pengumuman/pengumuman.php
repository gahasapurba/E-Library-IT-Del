<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Pengumuman</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Pengumuman</li>
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
                        <h3 class="card-title">Berikut Data Pengumuman Yang Telah Dibuat</h3>
                        <?php
                        if ($_SESSION['SuperAdmin'] || $_SESSION['Admin']) {
                        ?>
                            <div class="card-tools">
                                <a href="?page=pengumuman&aksi=tambah" class="btn btn-primary">
                                    Tambah Pengumuman
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Judul</th>
                                    <th class="text-center">Waktu Pengiriman</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $sql = $koneksi->query("SELECT * FROM tb_pengumuman");
                                while ($data = $sql->fetch_assoc()) {
                                ?>

                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td><?= $data['judul']; ?></td>
                                        <td class="text-center"><?= $data['waktuisi']; ?></td>
                                        <?php
                                        if ($_SESSION['SuperAdmin'] || $_SESSION['Admin']) {
                                        ?>
                                            <td class="text-center">
                                                <a href="?page=pengumuman&aksi=edit&id=<?= $data['id']; ?>" class="btn btn-outline-warning">Edit</a>
                                                <a href="?page=pengumuman&aksi=hapus&id=<?= $data['id']; ?>" class="btn btn-outline-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?');">Hapus</a>
                                            </td>
                                        <?php } else { ?>
                                            <td class="text-center">
                                                <a href="?page=pengumuman&aksi=detail&id=<?= $data['id']; ?>" class="btn btn-outline-warning">Lihat Detail Isi Pengumuman</a>
                                            </td>
                                        <?php } ?>
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