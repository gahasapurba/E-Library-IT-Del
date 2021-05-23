<?php

$id = $_GET['id'];

$sql = $koneksi->query("SELECT * FROM tb_buku WHERE id='$id'");

$tampil = $sql->fetch_assoc();

?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Pengeditan Data Buku</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="?page=buku">Buku</a></li>
                    <li class="breadcrumb-item active">Pengeditan Data Buku</li>
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
                        <h3 class="card-title">Silahkan Edit Data Buku</h3>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" class="form-control" name="judul" value="<?= $tampil['judul']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Pengarang</label>
                                <input type="text" class="form-control" name="pengarang" value="<?= $tampil['pengarang']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Penerbit</label>
                                <input type="text" class="form-control" name="penerbit" value="<?= $tampil['penerbit']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Tahun Terbit</label>
                                <input type="number" class="form-control" name="tahunterbit" value="<?= $tampil['tahun_terbit']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>ISBN</label>
                                <input type="number" class="form-control" name="isbn" value="<?= $tampil['isbn']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Jumlah Buku</label>
                                <input type="number" class="form-control" name="jumlahbuku" value="<?= $tampil['jumlah_buku']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Lokasi</label>
                                <select name="lokasi" class="form-control" required>
                                    <option value="">- Pilih Lokasi -</option>
                                    <option value="Rak 1" <?php if ($tampil['lokasi'] == "Rak 1") {
                                                                echo "selected";
                                                            } ?>>Rak 1</option>
                                    <option value="Rak 2" <?php if ($tampil['lokasi'] == "Rak 2") {
                                                                echo "selected";
                                                            } ?>>Rak 2</option>
                                    <option value="Rak 3" <?php if ($tampil['lokasi'] == "Rak 3") {
                                                                echo "selected";
                                                            } ?>>Rak 3</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Masuk</label>
                                <input type="date" class="form-control" name="tanggalmasuk" value="<?= $tampil['tgl_input']; ?>" required>
                            </div>
                            <div class="form-group">
                                <a type="button" class="btn btn-secondary" href="?page=buku">Batal</a>
                                <button type="submit" name="edit" class="btn btn-primary">Edit Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<?php

if (isset($_POST['edit'])) {

    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahunterbit = $_POST['tahunterbit'];
    $isbn = $_POST['isbn'];
    $jumlahbuku = $_POST['jumlahbuku'];
    $lokasi = $_POST['lokasi'];
    $tanggalmasuk = $_POST['tanggalmasuk'];

    $sql = $koneksi->query("UPDATE tb_buku SET judul='$judul', pengarang='$pengarang', penerbit='$penerbit', tahun_terbit='$tahunterbit', isbn='$isbn', jumlah_buku='$jumlahbuku', lokasi='$lokasi', tgl_input='$tanggalmasuk' WHERE id='$id'");

    if ($sql) {
?>
        <script>
            alert('Data Berhasil Diedit !');
            window.location.href = "?page=buku";
        </script>
<?php
    }
}

?>