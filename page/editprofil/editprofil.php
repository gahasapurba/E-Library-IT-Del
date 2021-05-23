<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Profil</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Edit Profil</li>
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
                        <h3 class="card-title">Silahkan Edit Profil Anda</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group mb-3">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" name="namalengkap" value="<?= $data['nama']; ?>" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempatlahir" value="<?= $data['tempat_lahir']; ?>" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>Tanggal Lahir</label>
                                <input type="text" onfocus="(this.type='date')" class="form-control" name="tanggallahir" value="<?= $data['tgl_lahir']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select name="jeniskelamin" class="form-control" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="L" <?php if ($data['jk'] == "L") {
                                                            echo "selected";
                                                        } ?>>Laki - laki</option>
                                    <option value="P" <?php if ($data['jk'] == "P") {
                                                            echo "selected";
                                                        } ?>>Perempuan</option>
                                </select>
                            </div>
                            <?php
                            if ($_SESSION['User']) {
                            ?>
                                <div class="form-group">
                                    <label>Prodi</label>
                                    <select name="prodi" class="form-control" required>
                                        <option value="">Pilih Prodi</option>
                                        <option value="D3 Teknologi Komputer" <?php if ($data['prodi'] == "D3 Teknologi Komputer") {
                                                                                    echo "selected";
                                                                                } ?>>D3 Teknologi Komputer</option>
                                        <option value="D3 Teknologi Informasi" <?php if ($data['prodi'] == "D3 Teknologi Informasi") {
                                                                                    echo "selected";
                                                                                } ?>>D3 Teknologi Informasi</option>
                                        <option value="D4 Teknologi Rekayasa Perangkat Lunak" <?php if ($data['prodi'] == "D4 Teknologi Rekayasa Perangkat Lunak") {
                                                                                                    echo "selected";
                                                                                                } ?>>D4 Teknologi Rekayasa Perangkat Lunak</option>
                                        <option value="S1 Informatika" <?php if ($data['prodi'] == "S1 Informatika") {
                                                                            echo "selected";
                                                                        } ?>>S1 Informatika</option>
                                        <option value="S1 Sistem Informasi" <?php if ($data['prodi'] == "S1 Sistem Informasi") {
                                                                                echo "selected";
                                                                            } ?>>S1 Sistem Informasi</option>
                                        <option value="S1 Teknik Elektro" <?php if ($data['prodi'] == "S1 Teknik Elektro") {
                                                                                echo "selected";
                                                                            } ?>>S1 Teknik Elektro</option>
                                        <option value="S1 Manajemen Rekayasa" <?php if ($data['prodi'] == "S1 Manajemen Rekayasa") {
                                                                                    echo "selected";
                                                                                } ?>>S1 Manajemen Rekayasa</option>
                                        <option value="S1 Teknik Bioproses" <?php if ($data['prodi'] == "S1 Teknik Bioproses") {
                                                                                echo "selected";
                                                                            } ?>>S1 Teknik Bioproses</option>
                                    </select>
                                </div>
                            <?php } ?>
                            <div class="form-group mb-3">
                                <label>Foto Profil</label><br>
                                <img id="output" src="profileimages/<?= $data['foto']; ?>" class="elevation-5 img-fluid rounded" style="width: 200px"><br><br>
                                <input type="text" onfocus="(this.type='file')" accept="image/*" onchange="loadFile(event)" class="form-control" placeholder="Edit Foto Profil" name="foto">
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" name="editprofil" class="btn btn-primary btn-block">Edit Profil</button>
                                    <a type="button" class="btn btn-secondary btn-block" href="index.php">Batal</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<?php

if (isset($_POST['editprofil'])) {
    $namalengkap = $_POST['namalengkap'];
    $tempatlahir = $_POST['tempatlahir'];
    $tanggallahir = $_POST['tanggallahir'];
    $jeniskelamin = $_POST['jeniskelamin'];
    $prodi = $_POST['prodi'];

    $foto = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];

    if (!empty($lokasi)) {
        $upload = move_uploaded_file($lokasi, "profileimages/" . $foto);

        $sql1 = $koneksi->query("UPDATE tb_anggota SET nama='$namalengkap', tempat_lahir='$tempatlahir', tgl_lahir='$tanggallahir', jk='$jeniskelamin', prodi='$prodi', foto='$foto' WHERE nim='$nim'");
        $sql2 = $koneksi->query("UPDATE tb_user SET nama='$namalengkap', tempat_lahir='$tempatlahir', tgl_lahir='$tanggallahir', jk='$jeniskelamin', prodi='$prodi', foto='$foto' WHERE id='$id'");

        if ($sql1 && $sql2) {
?>
            <script>
                alert('Edit Profil Berhasil !');
                window.location.href = "index.php";
            </script>
        <?php
        }
    } else {
        $sql1 = $koneksi->query("UPDATE tb_anggota SET nama='$namalengkap', tempat_lahir='$tempatlahir', tgl_lahir='$tanggallahir', jk='$jeniskelamin', prodi='$prodi' WHERE nim='$nim'");
        $sql2 = $koneksi->query("UPDATE tb_user SET nama='$namalengkap', tempat_lahir='$tempatlahir', tgl_lahir='$tanggallahir', jk='$jeniskelamin', prodi='$prodi' WHERE id='$id'");

        if ($sql1 && $sql2) {
        ?>
            <script>
                alert('Edit Profil Berhasil !');
                window.location.href = "index.php";
            </script>
<?php
        }
    }
}

?>

<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>