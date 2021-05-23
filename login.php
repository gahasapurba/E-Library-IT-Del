<?php error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); ?>

<?php

ob_start();

session_start();

$koneksi = new mysqli("localhost", "u969920341_library", "Library123456", "u969920341_library");

if ($_SESSION['SuperAdmin'] || $_SESSION['Admin'] || $_SESSION['User']) {
    header("location:index.php");
} else {

?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login Page - E-Library IT Del</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <link rel="stylesheet" href="dist/css/adminlte.min.css">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>

    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <img src="dist/img/itdel.png" style="width:50px">
                <a href="#"><b>E-Library</b> IT Del</a>
            </div>
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Silahkan Login Terlebih Dahulu</p>
                    <form method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="username" placeholder="Masukkan Username">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="password" placeholder="Masukkan Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
                            </div>
                        </div>
                    </form>
                    <br>
                    <p class="mb-0">
                        <a href="registrasi.php" class="text-center">Form Pendaftaran</a>
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

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = $koneksi->query("SELECT * FROM tb_user WHERE username='$username' AND password='$password'");

        $data = $sql->fetch_assoc();

        $ketemu = $sql->num_rows;

        if ($ketemu >= 1) {
            session_start();
            if ($data['level'] == "SuperAdmin") {
                $_SESSION['SuperAdmin'] = $data['id'];
                header("location:index.php");
            } else if ($data['level'] == "Admin") {
                $_SESSION['Admin'] = $data['id'];
                header("location:index.php");
            } else if ($data['level'] == "User") {
                $_SESSION['User'] = $data['id'];
                header("location:index.php");
            }
        } else {
    ?>
            <script>
                alert("Username / Password Salah, Silahkan Login Kembali !");
            </script>
<?php
        }
    }
}

?>