<?php

$id = $_GET['id'];

$sql = $koneksi->query("SELECT * FROM tb_pengumuman WHERE id='$id'");

$tampil = $sql->fetch_assoc();

?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Pengumuman</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="?page=pengumuman">Pengumuman</a></li>
                    <li class="breadcrumb-item active">Edit Pengumuman</li>
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
                        <h3 class="card-title">Silahkan Edit Pengumuman</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" class="form-control" name="judul" value="<?= $tampil['judul']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Isi Pengumuman</label>
                                <textarea name="isi" class="form-control" rows="10" required><?= $tampil['isi']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>File</label>
                                <input type="text" class="form-control" name="file" placeholder="Upload File Baru Jika Ingin Menambah / Mengganti File Di Pengumuman Ini" onfocus="(this.type='file')">
                            </div>
                            <div class="form-group">
                                <a type="button" class="btn btn-secondary" href="?page=pengumuman">Batal</a>
                                <button type="submit" name="edit" class="btn btn-primary">Edit Pengumuman</button>
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
    $isi = $_POST['isi'];
    $file = $_FILES['file'];

    $namafile = $file["name"];
    $namatmpfile = $file["tmp_name"];

    if (!empty($namatmpfile)) {
        move_uploaded_file($file["tmp_name"], "file/" . $file["name"]);

        $sql = $koneksi->query("UPDATE tb_pengumuman SET judul='$judul', isi='$isi', file='$namafile' WHERE id='$id'");

        if ($sql) {
?>
            <script>
                alert('Pengumuman Berhasil Diedit !');
                window.location.href = "?page=pengumuman";
            </script>
        <?php
        }
    } else {
        $sql = $koneksi->query("UPDATE tb_pengumuman SET judul='$judul', isi='$isi' WHERE id='$id'");

        if ($sql) {
        ?>
            <script>
                alert('Pengumuman Berhasil Diedit !');
                window.location.href = "?page=pengumuman";
            </script>
<?php
        }
    }
}

?>