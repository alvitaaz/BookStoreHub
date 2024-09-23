<?php
include "../../db.php";

$conn = new mysqli($servername, $username, $password, $dbname);

// buat meriksa koneksi 
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// ngambil nilai id_kategori dari URL
$kd = $_GET['id'];

// Query untuk ngapus data dari tabel 'kategori'
$qry = $conn->query("DELETE FROM kategori WHERE id_kategori='$kd'");

// buat meriksa apakah query berhasil dijalankan
if ($qry) {
    header('location:kategori.php'); // Redirect ke halaman kategori setelah penghapusan berhasil
} else {
    echo "Error: " . $conn->error; // buat nampiliin pesan error jika query gagal
}

// Tutup koneksi
$conn->close();
?>
