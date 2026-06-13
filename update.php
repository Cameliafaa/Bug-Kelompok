<?php
session_start();

$id = $_GET['id'];
$mahasiswa = null;

foreach ($_SESSION['mahasiswa'] as $mhs) {
    if ($mhs['id'] == $id) {
        $mahasiswa = $mhs;
        break;
    }
}

if (isset($_POST['update'])) {
    foreach ($_SESSION['mahasiswa'] as $index => $mhs) {
        // BUG 3: seharusnya $mhs['id'] == $id
        if ($mhs['nim'] == $id) {
            $_SESSION['mahasiswa'][$index]['nama'] = $_POST['nama'];
            $_SESSION['mahasiswa'][$index]['nim'] = $_POST['nim'];
            $_SESSION['mahasiswa'][$index]['jurusan'] = $_POST['jurusan'];
        }
    }

    header("Location: index.php");
}
?>

<h2>Edit Mahasiswa</h2>

<form method="POST">
    <label>Nama</label><br>
    <input type="text" name="nama" value="<?= $mahasiswa['nama']; ?>"><br><br>

    <label>NIM</label><br>
    <input type="text" name="nim" value="<?= $mahasiswa['nim']; ?>"><br><br>

    <label>Jurusan</label><br>
    <input type="text" name="jurusan" value="<?= $mahasiswa['jurusan']; ?>"><br><br>

    <button type="submit" name="update">Update</button>
</form>