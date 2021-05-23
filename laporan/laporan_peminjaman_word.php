<?php

$koneksi = new mysqli("localhost", "u969920341_library", "Library123456", "u969920341_library");

$filename = "Data_Peminjaman-(" . date('d-m-Y') . ").doc";

header("content-type: application/vdn.ms-word");
header("content-disposition: attachment; filename=$filename");

include "../function.php";

?>

<h2>Laporan Peminjaman</h2>

<table border="1">
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Judul</th>
            <th class="text-center">NIM</th>
            <th class="text-center">Nama Lengkap</th>
            <th class="text-center">Tanggal Pinjam</th>
            <th class="text-center">Tanggal Kembali</th>
            <th class="text-center">Keterlambatan</th>
            <th class="text-center">Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $sql = $koneksi->query("SELECT * FROM tb_transaksi");
        while ($data = $sql->fetch_assoc()) {
        ?>

            <tr>
                <td class="text-center"><?= $no++; ?></td>
                <td><?= $data['judul']; ?></td>
                <td class="text-center"><?= $data['nim']; ?></td>
                <td><?= $data['nama']; ?></td>
                <td class="text-center"><?= $data['tgl_pinjam']; ?></td>
                <td class="text-center"><?= $data['tgl_kembali']; ?></td>
                <td class="text-center">
                    <?php

                    $denda = 1000;

                    $tgl_dateline2 = $data['tgl_kembali'];
                    $tgl_kembali = date('Y-m-d');

                    $lambat = terlambat($tgl_dateline2, $tgl_kembali);
                    $denda1 = $lambat * $denda;

                    if ($lambat > 0) {
                        echo "
                            <font color='red'>$lambat Hari<br>(Rp $denda1)</font>
                        ";
                    } else {
                        echo $lambat . " Hari";
                    }

                    ?>
                </td>
                <td><?= $data['status']; ?></td>
            </tr>

        <?php } ?>
    </tbody>
</table>