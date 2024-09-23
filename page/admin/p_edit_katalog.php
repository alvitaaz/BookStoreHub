<?php
include "../../db.php";
$kd = $_POST['id_katalog'];
$katalog = $_POST['katalog'];

// Inisialisasi koneksi ke database
$koneksi = mysqli_connect('localhost', 'root', '', 'bookselling');
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$qry = mysqli_query($koneksi, "UPDATE katalog SET katalog = '$katalog' WHERE id_katalog = '$kd'");
if ($qry) {
    header('location:katalog.php');
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>
