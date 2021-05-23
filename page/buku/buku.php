<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Buku</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Buku</li>
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
                        <h3 class="card-title">Berikut Data Buku Yang Ada di Perpustakaan IT Del</h3>
                        <?php
                        if ($_SESSION['SuperAdmin'] || $_SESSION['Admin']) {
                        ?>
                            <div class="card-tools">
                                <a href="?page=buku&aksi=tambah" class="btn btn-primary">
                                    Tambah Data Buku
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
                                    <th class="text-center">Pengarang</th>
                                    <th class="text-center">Penerbit</th>
                                    <th class="text-center">Tahun Terbit</th>
                                    <th class="text-center">ISBN</th>
                                    <th class="text-center">Jumlah Buku</th>
                                    <th class="text-center">Lokasi</th>
                                    <th class="text-center">Tanggal Masuk</th>
                                    <?php
                                    if ($_SESSION['SuperAdmin'] || $_SESSION['Admin']) {
                                    ?>
                                        <th class="text-center">Aksi</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $sql = $koneksi->query("SELECT * FROM tb_buku");
                                while ($data = $sql->fetch_assoc()) {
                                ?>

                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td><?= $data['judul']; ?></td>
                                        <td><?= $data['pengarang']; ?></td>
                                        <td><?= $data['penerbit']; ?></td>
                                        <td class="text-center"><?= $data['tahun_terbit']; ?></td>
                                        <td class="text-center"><?= $data['isbn']; ?></td>
                                        <td class="text-center"><?= $data['jumlah_buku']; ?></td>
                                        <td class="text-center"><?= $data['lokasi']; ?></td>
                                        <td class="text-center"><?= $data['tgl_input']; ?></td>
                                        <?php
                                        if ($_SESSION['SuperAdmin'] || $_SESSION['Admin']) {
                                        ?>
                                            <td class="text-center">
                                                <a href="?page=buku&aksi=edit&id=<?= $data['id']; ?>" class="btn btn-outline-warning">Edit</a>
                                                <a href="?page=buku&aksi=hapus&id=<?= $data['id']; ?>" class="btn btn-outline-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?');">Hapus</a>
                                            </td>
                                        <?php } ?>
                                    </tr>

                                <?php } ?>
                            </tbody>
                        </table>
                        <?php
                        if ($_SESSION['SuperAdmin'] || $_SESSION['Admin']) {
                        ?>
                            <a href="laporan/laporan_buku_excel.php" target="blank" class="btn btn-default">
                                <i class="fa fa-print"></i>
                                Export To Excel
                            </a>
                            <a href="laporan/laporan_buku_word.php" target="blank" class="btn btn-default">
                                <i class="fa fa-print"></i>
                                Export To Word
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>