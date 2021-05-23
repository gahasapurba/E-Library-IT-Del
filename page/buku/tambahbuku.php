<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Penambahan Data Buku</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="?page=buku">Buku</a></li>
                    <li class="breadcrumb-item active">Penambahan Data Buku</li>
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
                        <h3 class="card-title">Silahkan Tambah Data Buku</h3>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" class="form-control" name="judul" placeholder="Masukkan Judul Buku" required>
                            </div>
                            <div class="form-group">
                                <label>Pengarang</label>
                                <input type="text" class="form-control" name="pengarang" placeholder="Masukkan Nama Pengarang Buku" required>
                            </div>
                            <div class="form-group">
                                <label>Penerbit</label>
                                <input type="text" class="form-control" name="penerbit" placeholder="Masukkan Nama Penerbit Buku" required>
                            </div>
                            <div class="form-group">
                                <label>Tahun Terbit</label>
                                <input type="number" class="form-control" name="tahunterbit" placeholder="Masukkan Tahun Terbit Buku" required>
                            </div>
                            <div class="form-group">
                                <label>ISBN</label>
                                <input type="number" class="form-control" name="isbn" placeholder="Masukkan Nomor ISBN Buku" required>
                            </div>
                            <div class="form-group">
                                <label>Jumlah Buku</label>
                                <input type="number" class="form-control" name="jumlahbuku" placeholder="Masukkan Jumlah Buku" required>
                            </div>
                            <div class="form-group">
                                <label>Lokasi</label>
                                <select name="lokasi" class="form-control" required>
                                    <option value="">Pilih Lokasi Penyimpanan Buku</option>
                                    <option value="Rak 1">Rak 1</option>
                                    <option value="Rak 2">Rak 2</option>
                                    <option value="Rak 3">Rak 3</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Masuk</label>
                                <input type="text" onfocus="(this.type='date')" class="form-control" name="tanggalmasuk" placeholder="Masukkan Tanggal Masuk Buku Ke Perpustakaan" required>
                            </div>
                            <div class="form-group">
                                <a type="button" class="btn btn-secondary" href="?page=buku">Batal</a>
                                <button type="submit" name="simpan" class="btn btn-primary">Simpan Data</button>
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

    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahunterbit = $_POST['tahunterbit'];
    $isbn = $_POST['isbn'];
    $jumlahbuku = $_POST['jumlahbuku'];
    $lokasi = $_POST['lokasi'];
    $tanggalmasuk = $_POST['tanggalmasuk'];

    $sql = $koneksi->query("INSERT INTO tb_buku (judul, pengarang, penerbit, tahun_terbit, isbn, jumlah_buku, lokasi, tgl_input)VALUES('$judul', '$pengarang', '$penerbit', '$tahunterbit', '$isbn', '$jumlahbuku', '$lokasi', '$tanggalmasuk')");

    if ($sql) {
?>
        <script>
            alert('Data Berhasil Ditambahkan !');
            window.location.href = "?page=buku";
        </script>
<?php
    }
}

?>