<?php

$id = $_GET['id'];

$sql = $koneksi->query("SELECT * FROM tb_pesanterkirim WHERE id='$id'");

$tampil = $sql->fetch_assoc();

?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Pengeditan Isi Pesan Terkirim</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="?page=pesan&aksi=terkirim">Pesan Terkirim</a></li>
                    <li class="breadcrumb-item active">Pengeditan Isi Pesan Terkirim</li>
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
                        <h3 class="card-title">Silahkan Edit Isi Pesan Yang Telah Anda Kirimkan</h3>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group">
                                <label>Isi Pesan</label>
                                <textarea name="isipesan" class="form-control" rows="5" required><?= $tampil['isipesan']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <a type="button" class="btn btn-secondary" href="?page=pesan&aksi=terkirim">Batal</a>
                                <button type="submit" name="edit" class="btn btn-primary">Edit Pesan</button>
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

    $isipesan = $_POST['isipesan'];

    $sql1 = $koneksi->query("UPDATE tb_pesanmasuk SET isipesan='$isipesan' WHERE id='$id'");
    $sql2 = $koneksi->query("UPDATE tb_pesanterkirim SET isipesan='$isipesan' WHERE id='$id'");

    if ($sql1 && $sql2) {
?>
        <script>
            alert('Isi Pesan Berhasil Diedit !');
            window.location.href = "?page=pesan&aksi=terkirim";
        </script>
<?php
    }
}

?>