<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Pesan Masuk</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Pesan Masuk</li>
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
                        <h3 class="card-title">Berikut Daftar Pesan Yang Masuk Ke Anda</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama Pengirim</th>
                                    <th class="text-center">Status Pengirim</th>
                                    <th class="text-center">Foto Pengirim</th>
                                    <th class="text-center">Waktu Pengiriman</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $sql = $koneksi->query("SELECT * FROM tb_pesanmasuk WHERE penerima='$namauser'");
                                while ($data = $sql->fetch_assoc()) {
                                ?>

                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td><?= $data['pengirim']; ?></td>
                                        <td class="text-center"><?= $data['levelpengirim']; ?></td>
                                        <td class="text-center">
                                            <img src="profileimages/<?= $data['fotopengirim']; ?>" style="width: 100px">
                                        </td>
                                        <td class="text-center"><?= $data['waktupengiriman']; ?></td>
                                        <td class="text-center">
                                            <a href="?page=pesan&aksi=detail&id=<?= $data['id']; ?>" class="btn btn-outline-success">Lihat Isi Pesan</a>
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