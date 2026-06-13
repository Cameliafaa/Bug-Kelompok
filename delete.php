<?php
session_start();

$id = $_GET['id'];

foreach ($_SESSION['mahasiswa'] as $index => $mhs) {
    // BUG 4: seharusnya == agar data yang dipilih saja yang dihapus
    if ($mhs['id'] != $id) {
        unset($_SESSION['mahasiswa'][$index]);
    }
}

header("Location: index.php");
?>