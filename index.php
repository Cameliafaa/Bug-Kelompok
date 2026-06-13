<?php
session_start();

// Inisialisasi data dummy jika session belum ada
if (!isset($_SESSION['mahasiswa'])) {
    $_SESSION['mahasiswa'] = [
        ["id" => 1, "nama" => "Andi Saputra", "nim" => "231011701001", "jurusan" => "Teknik Informatika"],
        ["id" => 2, "nama" => "Budi Santoso", "nim" => "231011701002", "jurusan" => "Sistem Informasi"],
        ["id" => 3, "nama" => "Citra Lestari", "nim" => "231011701003", "jurusan" => "Teknik Komputer"]
    ];
}

$dataMahasiswa = $_SESSION['mahasiswa'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>CRUD Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Data Mahasiswa</h2>
    <a href="add.php" class="btn">+ Tambah Mahasiswa</a>

    <table>
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
            <td><?= htmlspecialchars($mhs['nama']); ?></td>
            <td><?= htmlspecialchars($mhs['nim']); ?></td>
            <td><?= htmlspecialchars($mhs['jurusan'] ?? ''); ?></td>
            <td>
                <a href="update.php?id=<?= $mhs['id']; ?>" class="btn btn-edit">Edit</a>
                <a href="delete.php?id=<?= $mhs['id']; ?>" class="btn btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>