<?php error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); ?>

<?php

$koneksi = new mysqli("localhost", "u969920341_library", "Library123456", "u969920341_library");

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registration Page - E-Library IT Del</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <img src="dist/img/itdel.png" style="width:50px">
            <a href="#"><b>E-Library</b> IT Del</a>
        </div>
        <div class="card">
            <div class="card-body register-card-body">
                <p class="register-box-msg">Silahkan Registrasi</p>
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" name="namalengkap" placeholder="Masukkan Nama Lengkap" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>NIM</label>
                        <input type="text" class="form-control" name="nim" placeholder="Masukkan NIM" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempatlahir" placeholder="Masukkan Tempat Lahir" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Tanggal Lahir</label>
                        <input type="text" onfocus="(this.type='date')" class="form-control" name="tanggallahir" placeholder="Masukkan Tanggal Lahir" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Jenis Kelamin</label>
                        <select name="jeniskelamin" class="form-control" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="L">Laki - laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label>Prodi</label>
                        <select name="prodi" class="form-control" required>
                            <option value="">Pilih Prodi</option>
                            <option value="D3 Teknologi Komputer">D3 Teknologi Komputer</option>
                            <option value="D3 Teknologi Informasi">D3 Teknologi Informasi</option>
                            <option value="D4 Teknologi Rekayasa Perangkat Lunak">D4 Teknologi Rekayasa Perangkat Lunak</option>
                            <option value="S1 Informatika">S1 Informatika</option>
                            <option value="S1 Sistem Informasi">S1 Sistem Informasi</option>
                            <option value="S1 Teknik Elektro">S1 Teknik Elektro</option>
                            <option value="S1 Manajemen Rekayasa">S1 Manajemen Rekayasa</option>
                            <option value="S1 Teknik Bioproses">S1 Teknik Bioproses</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label>Foto Profil</label>
                        <input type="text" onfocus="(this.type='file')" class="form-control" name="foto" placeholder="Masukkan Foto Profil" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Masukkan Username" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Masukkan Password" required>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" name="register" class="btn btn-primary btn-block">Daftar</button>
                        </div>
                    </div>
                </form>
                <br>
                <p class="mb-0">
                    <a href="login.php" class="text-center">Form Login</a>
                </p>
            </div>
        </div>
    </div>

    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/adminlte.min.js"></script>

</body>

</html>

<?php

if (isset($_POST['register'])) {
    $namalengkap = $_POST['namalengkap'];
    $nim = $_POST['nim'];
    $tempatlahir = $_POST['tempatlahir'];
    $tanggallahir = $_POST['tanggallahir'];
    $jeniskelamin = $_POST['jeniskelamin'];
    $prodi = $_POST['prodi'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $foto = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    $upload = move_uploaded_file($lokasi, "profileimages/" . $foto);

    if ($upload) {

        $sql1 = $koneksi->query("INSERT INTO tb_anggota (nim, nama, tempat_lahir, tgl_lahir, jk, prodi, foto, level)VALUES('$nim', '$namalengkap', '$tempatlahir', '$tanggallahir', '$jeniskelamin', '$prodi', '$foto', 'User')");
        $sql2 = $koneksi->query("INSERT INTO tb_user (username, password, nama, nim, tempat_lahir, tgl_lahir, jk, prodi, level, foto)VALUES('$username', '$password', '$namalengkap', '$nim', '$tempatlahir', '$tanggallahir', '$jeniskelamin', '$prodi', 'User', '$foto')");

        if ($sql1 && $sql2) {
?>
            <script>
                alert('Pendaftaran Berhasil, Silahkan Login !');
                window.location.href = "login.php";
            </script>
<?php
        }
    }
}

?>