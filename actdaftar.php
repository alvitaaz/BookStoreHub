<?php
include "db.php";

// ngambil data dari form
$nama = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['pass'];

// lakukan query untuk menyimpan data ke dalam database menggunakan MySQLi
$stmt = $conn->prepare("INSERT INTO customer (nama_cus, email_cus, password_cus) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nama, $email, $password);

// jalankan query
if ($stmt->execute()) {
    // Redirect ke halaman index dengan pesan berhasil
    header("location:index.php?pesan=berhasil daftar");
} else {
    // kalo query gagal dijalankan, bakal nampilin pesan error
    echo "Error: " . $conn->error;
}

// Tutup statement dan koneksi database
$stmt->close();
$conn->close();
?>
