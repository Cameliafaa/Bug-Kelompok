<?php
session_start();

if (!isset($_SESSION['mahasiswa'])) {
    $_SESSION['mahasiswa'] = [
        ["id" => 1, "nama" => "Andi", "nim" => "101", "jurusan" => "Informatika"],
        ["id" => 2, "nama" => "Budi", "nim" => "102", "jurusan" => "Sistem Informasi"]
    ];
}

$dataMahasiswa = $_SESSION['mahasiswa'];
?>

<h2>Data Mahasiswa</h2>
<a href="tambah.php">Tambah Data</a>

<table border="1" cellpadding="8">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>NIM</th>
        <th>Jurusan</th>
        <th>Aksi</th>
    </tr>

    <?php foreach ($dataMahasiswa as $index => $mhs) { ?>
    <tr>
        <td><?= $index + 1; ?></td>
        <td><?= $mhs['nama']; ?></td>
        <td><?= $mhs['nim']; ?></td>

        <!-- BUG 1: nama key salah, seharusnya jurusan -->
        <td><?= $mhs['jurussan'] ?? ''; ?></td>

        <td>
            <a href="edit.php?id=<?= $mhs['id']; ?>">Edit</a> |
            <a href="hapus.php?id=<?= $mhs['id']; ?>">Hapus</a>
        </td>
    </tr>
    <?php } ?>
</table>