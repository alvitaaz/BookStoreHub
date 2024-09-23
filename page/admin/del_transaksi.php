<?php
include "../../db.php";

$conn = new mysqli($servername, $username, $password, $dbname);

//seperti biasa buat meriksa koneksi 
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// ambil nilai kode_beli dari URL
$kd = $_GET['id'];

// Query buat ngapus data dari tabel 'selesai'
$qry = $conn->prepare("DELETE FROM selesai WHERE kode_beli = ?");
$qry->bind_param("s", $kd); // Bind parameter
$qry->execute(); // Eksekusi query

// meriksa apa query berhasil dijalankan
if ($qry) {
    header('location:transaksi.php'); // Redirect ke halaman transaksi setelah penghapusan berhasil
} else {
    echo "Error: " . $conn->error; // nampilin pesan error kalo querry nya gagal
}

// Tutup koneksi
$conn->close();
?>
