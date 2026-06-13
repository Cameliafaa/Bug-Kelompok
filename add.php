<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];

    // Membuat ID otomatis (mencari ID terakhir + 1)
    $id = 1;
    if (count($_SESSION['mahasiswa']) > 0) {
        $last_item = end($_SESSION['mahasiswa']);
        $id = $last_item['id'] + 1;
    }

    // Memasukkan data baru ke session array
    $_SESSION['mahasiswa'][] = [
        "id" => $id,
        "nama" => $nama,
        "nim" => $nim,
        "jurusan" => $jurusan
    ];

    // Mengembalikan ke halaman index
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Tambah Data Mahasiswa</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" required>
        </div>
        <div class="form-group">
            <label>NIM:</label>
            <input type="text" name="nim" required>
        </div>
        <div class="form-group">
            <label>Jurusan:</label>
            <input type="text" name="jurusan" required>
        </div>
        <button type="submit" class="btn">Simpan Data</button>
        <a href="index.php" class="btn btn-delete" style="text-decoration:none;">Batal</a>
    </form>
</div>

</body>
</html>