<?php

$tgl_pinjam = date("d-m-Y");
$tujuh_hari = mktime(0, 0, 0, date("n"), date("j") + 7, date("Y"));
$kembali = date("d-m-Y", $tujuh_hari);

?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Penambahan Data Peminjaman Buku</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="?page=transaksi">Peminjaman</a></li>
                    <li class="breadcrumb-item active">Penambahan Data Peminjaman Buku</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Silahkan Masukkan Data Peminjaman Buku</h3>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group">
                                <label>Judul Buku</label>
                                <select name="bukupinjaman" class="form-control" required>
                                    <option value="">Pilih Judul Buku Yang Hendak Dipinjam</option>
                                    <?php

                                    $sql = $koneksi->query("SELECT * FROM tb_buku ORDER BY id");

                                    while ($data = $sql->fetch_assoc()) {
                                        echo "<option value='$data[id].$data[judul]'>$data[judul]</option>";
                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Peminjam</label>
                                <input type="text" class="form-control" name="namapeminjam" value="<?= $namauser; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Pinjam</label>
                                <input type="text" class="form-control" name="tanggalpinjam" value="<?= $tgl_pinjam; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Kembali</label>
                                <input type="text" class="form-control" name="tanggalkembali" value="<?= $kembali; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <a type="button" class="btn btn-secondary" href="?page=transaksi">Batal</a>
                                <button type="submit" name="simpan" class="btn btn-primary">Pinjam Buku</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<?php

if (isset($_POST['simpan'])) {

    $tanggalpinjam = $_POST['tanggalpinjam'];
    $tanggalkembali = $_POST['tanggalkembali'];

    $bukupinjaman = $_POST['bukupinjaman'];
    $pecah_buku = explode(".", $bukupinjaman);
    $id = $pecah_buku[0];
    $judul = $pecah_buku[1];

    $namapeminjam = $_POST['namapeminjam'];

    $sql = $koneksi->query("SELECT * FROM tb_buku WHERE judul = '$judul'");

    while ($data = $sql->fetch_assoc()) {
        $sisa = $data['jumlah_buku'];

        if ($sisa == 0) {
?>
            <script>
                alert('Stok Buku Habis Peminjaman Tidak Dapat Dilakukan, Silahkan Pilih Buku Lain Yang Masih tersedia !');
                window.location.href = "?page=transaksi&aksi=tambah";
            </script>
        <?php
        } else {
            $sql = $koneksi->query("INSERT INTO tb_transaksi (judul, nim, nama, tgl_pinjam, tgl_kembali, status)VALUES('$judul', '$nim', '$namapeminjam', '$tanggalpinjam', '$tanggalkembali', 'Dipinjam')");
            $sql2 = $koneksi->query("UPDATE tb_buku SET jumlah_buku = (jumlah_buku-1) WHERE id = '$id'");

        ?>
            <script>
                alert('Data Peminjaman Berhasil Disimpan, Silahkan Ambil Buku Ke Perpustakaan !');
                window.location.href = "?page=transaksi";
            </script>
<?php
        }
    }
}
