<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Pengisian Kuesioner</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Kuesioner</li>
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
                        <h3 class="card-title">Silahkan Isi Kuesioner Dibawah Ini, Sebagai Indeks Kepuasan Anda Terhadap Aplikasi E-Library IT Del Ini</h3>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group">
                                <label>1. Apakah anda merasa terbantu dengan penggunaan aplikasi E-Library IT Del ini ?</label> <br>
                                <input type='radio' name='jawabanp1' value='Tidak Terbantu' required> Tidak Terbantu <br>
                                <input type='radio' name='jawabanp1' value='Kurang Terbantu' required> Kurang Terbantu <br>
                                <input type='radio' name='jawabanp1' value='Cukup Terbantu' required> Cukup Terbantu <br>
                                <input type='radio' name='jawabanp1' value='Sangat Terbantu' required> Sangat Terbantu <br>
                            </div>
                            <div class="form-group">
                                <label>2. Bagaimana menurut anda kelengkapan buku yang terdaftar di E-Library IT Del ini?</label> <br>
                                <input type='radio' name='jawabanp2' value='Tidak Lengkap' required> Tidak Lengkap <br>
                                <input type='radio' name='jawabanp2' value='Kurang Lengkap' required> Kurang Lengkap <br>
                                <input type='radio' name='jawabanp2' value='Cukup Lengkap' required> Cukup Lengkap <br>
                                <input type='radio' name='jawabanp2' value='Sangat Lengkap' required> Sangat Lengkap <br>
                            </div>
                            <div class="form-group">
                                <label>3. Apa saran anda agar kedepannya E-Library IT Del ini dapat lebih baik lagi?</label> <br>
                                <textarea class="form-control" name="saran" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <a type="button" class="btn btn-secondary" href="index.php">Batal</a>
                                <button type="submit" name="simpan" class="btn btn-primary">Kirim Kuesioner</button>
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

    $jawabanp1 = $_POST['jawabanp1'];
    $jawabanp2 = $_POST['jawabanp2'];
    $saran = $_POST['saran'];

    $sql = $koneksi->query("INSERT INTO tb_kuesioner (nim, nama, prodi, jk, p1, p2, saran)VALUES('$nim', '$namauser', '$prodiuser', '$jeniskelaminuser', '$jawabanp1', '$jawabanp2', '$saran')");

    if ($sql) {
?>
        <script>
            alert('Terimakasih Telah Mengisi Kuesioner !');
            window.location.href = "index.php";
        </script>
<?php
    }
}

?>