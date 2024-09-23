<?php
include "../../db.php";
$kd = $_POST['id_buku'];
$stok = $_POST['stok'];

// Inisialisasi koneksi ke database
$koneksi = mysqli_connect('localhost', 'root', '', 'bookselling');
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$qry = mysqli_query($koneksi, "UPDATE stok SET stok = '$stok' WHERE id_buku = '$kd'");
if ($qry) {
    header('location:buku.php');
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>
