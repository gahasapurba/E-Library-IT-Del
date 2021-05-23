<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Pesan Terkirim</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Pesan Terkirim</li>
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
                        <h3 class="card-title">Berikut Daftar Pesan Yang Anda Kirimkan</h3>
                        <div class="card-tools">
                            <a href="?page=pesan&aksi=tambah" class="btn btn-primary">
                                Kirim Pesan
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama Penerima</th>
                                    <th class="text-center">Waktu Pengiriman</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $sql = $koneksi->query("SELECT * FROM tb_pesanterkirim WHERE pengirim='$namauser'");
                                while ($data = $sql->fetch_assoc()) {
                                ?>

                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td><?= $data['penerima']; ?></td>
                                        <td class="text-center"><?= $data['waktupengiriman']; ?></td>
                                        <td class="text-center">
                                            <a href="?page=pesan&aksi=edit&id=<?= $data['id']; ?>" class="btn btn-outline-success">Edit Isi Pesan</a>
                                            <a href="?page=pesan&aksi=hapus&id=<?= $data['id']; ?>" class="btn btn-outline-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Pesan Ini ?, Apabila Pesan Ini Dihapus, Maka Penerima Tidak Bisa Melihat Pesan Ini Lagi');">Hapus</a>
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