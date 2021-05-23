<?php

$koneksi = new mysqli("localhost", "u969920341_library", "Library123456", "u969920341_library");

$filename = "Data_Anggota-(" . date('d-m-Y') . ").xls";

header("content-type: application/vdn.ms-excel");
header("content-disposition: attachment; filename=$filename");

?>

<h2>Laporan Anggota</h2>

<table border="1">
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">NIM</th>
            <th class="text-center">Nama Lengkap</th>
            <th class="text-center">Tempat Lahir</th>
            <th class="text-center">Tanggal Lahir</th>
            <th class="text-center">Jenis Kelamin</th>
            <th class="text-center">Prodi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $sql = $koneksi->query("SELECT * FROM tb_anggota WHERE level='User'");
        while ($data = $sql->fetch_assoc()) {
        ?>
            <tr>
                <td class="text-center"><?= $no++; ?></td>
                <td class="text-center"><?= $data['nim']; ?></td>
                <td><?= $data['nama']; ?></td>
                <td><?= $data['tempat_lahir']; ?></td>
                <td class="text-center"><?= $data['tgl_lahir']; ?></td>
                <td class="text-center"><?= $data['jk']; ?></td>
                <td><?= $data['prodi']; ?></td>
            </tr>

        <?php } ?>
    </tbody>
</table>