<?php
include "../../db.php";

$conn = new mysqli($servername, $username, $password, $dbname);

// buat meriksa koneksi nih
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil nilai id_katalog dari URL
$kd = $_GET['id'];

// Query untuk menghapus data dari tabel 'katalog'
$qry = $conn->query("DELETE FROM katalog WHERE id_katalog='$kd'");

// Periksa apa query berhasil dijalankan atau gaa
if ($qry) {
    header('location:katalog.php'); // Redirect ke halaman katalog setelah penghapusan berhasil
} else {
    echo "Error: " . $conn->error; // ini buat nampiliin pesan error kalo query gagal
}

// Tutup koneksi
$conn->close();
?>
