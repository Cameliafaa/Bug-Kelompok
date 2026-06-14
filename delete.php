<?php
session_start();

$id = $_GET['id'];

foreach ($_SESSION['mahasiswa'] as $index => $mhs) {
    if ($mhs['id'] == $id) {
        unset($_SESSION['mahasiswa'][$index]);
        break;
    }
}

// rapikan index array supaya nomor tabel berurutan
$_SESSION['mahasiswa'] = array_values($_SESSION['mahasiswa']);

header("Location: index.php");
exit;
?>