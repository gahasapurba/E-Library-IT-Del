<?php

$koneksi = new mysqli("localhost", "u969920341_library", "Library123456", "u969920341_library");

$filename = "Data_Buku-(" . date('d-m-Y') . ").xls";

header("content-type: application/vdn.ms-excel");
header("content-disposition: attachment; filename=$filename");

?>

<h2>Laporan Buku</h2>

<table border="1">
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Judul</th>
            <th class="text-center">Pengarang</th>
            <th class="text-center">Penerbit</th>
            <th class="text-center">Tahun Terbit</th>
            <th class="text-center">ISBN</th>
            <th class="text-center">Jumlah Buku</th>
            <th class="text-center">Lokasi</th>
            <th class="text-center">Tanggal Masuk</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $sql = $koneksi->query("SELECT * FROM tb_buku");
        while ($data = $sql->fetch_assoc()) {
        ?>

            <tr>
                <td class="text-center"><?= $no++; ?></td>
                <td><?= $data['judul']; ?></td>
                <td><?= $data['pengarang']; ?></td>
                <td><?= $data['penerbit']; ?></td>
                <td class="text-center"><?= $data['tahun_terbit']; ?></td>
                <td class="text-center"><?= $data['isbn']; ?></td>
                <td class="text-center"><?= $data['jumlah_buku']; ?></td>
                <td class="text-center"><?= $data['lokasi']; ?></td>
                <td class="text-center"><?= $data['tgl_input']; ?></td>
            </tr>

        <?php } ?>
    </tbody>
</table>