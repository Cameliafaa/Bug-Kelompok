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

        // BUG 3: kondisi salah, seharusnya $mhs['id'] == $id
if ($mhs['id'] == $id) {
                $_SESSION['mahasiswa'][$index]['nama'] = $_POST['nama'];
            $_SESSION['mahasiswa'][$index]['nim'] = $_POST['nim'];
            $_SESSION['mahasiswa'][$index]['jurusan'] = $_POST['jurusan'];
        }
    }

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Edit Mahasiswa</h2>

    <form method="POST">
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" value="<?= $mahasiswa['nama']; ?>" required>
        </div>

        <div class="form-group">
            <label>NIM</label>
            <input type="text" name="nim" value="<?= $mahasiswa['nim']; ?>" required>
        </div>

        <div class="form-group">
            <label>Jurusan</label>
            <input type="text" name="jurusan" value="<?= $mahasiswa['jurusan']; ?>" required>
        </div>

        <button type="submit" name="update" class="btn">Update</button>
        <a href="index.php" class="btn btn-back">Kembali</a>
    </form>
</div>

</body>
</html>