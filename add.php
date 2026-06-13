<?php
session_start();

if (isset($_POST['simpan'])) {
    $dataBaru = [
        "id" => count($_SESSION['mahasiswa']) + 1,
        "nama" => $_POST['nama'],
        "nim" => $_POST['nim'],
        "jurusan" => $_POST['jurusan']
    ];

    // BUG 2: data baru belum dimasukkan ke session
    // $_SESSION['mahasiswa'][] = $dataBaru;

    header("Location: index.php");
}
?>

<h2>Tambah Mahasiswa</h2>

<form method="POST">
    <label>Nama</label><br>
    <input type="text" name="nama"><br><br>

    <label>NIM</label><br>
    <input type="text" name="nim"><br><br>

    <label>Jurusan</label><br>
    <input type="text" name="jurusan"><br><br>

    <button type="submit" name="simpan">Simpan</button>
</form>