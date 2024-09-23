<?php
include "../../db.php";

// Pastikan data yang diterima dari form tidak kosong
if(isset($_POST['id_kategori'], $_POST['kategori']) && !empty($_POST['id_kategori']) && !empty($_POST['kategori'])) {
    // Sambungkan ke database (ganti sesuai kebutuhan Anda)
    $koneksi = mysqli_connect('localhost', 'root', '', 'bookselling');

    // Periksa koneksi
    if (mysqli_connect_errno()) {
        die("Koneksi Gagal: " . mysqli_connect_error());
    }

    // Lindungi dari SQL Injection dengan prepared statement
    $kd = mysqli_real_escape_string($koneksi, $_POST['id_kategori']);
    $kategori = mysqli_real_escape_string($koneksi, $_POST['kategori']);

    // Query untuk melakukan update data kategori
    $qry = "UPDATE kategori SET kategori = '$kategori' WHERE id_kategori = '$kd'";
    if (mysqli_query($koneksi, $qry)) {
        // Redirect ke halaman kategori setelah update selesai
        header('location:kategori.php');
        exit(); // Pastikan untuk menghentikan eksekusi kode selanjutnya setelah melakukan redirect
    } else {
        echo "Error: " . $qry . "<br>" . mysqli_error($koneksi);
    }

    // Tutup koneksi database
    mysqli_close($koneksi);
} else {
    // Jika ada data yang kosong, tampilkan pesan error
    echo "Data tidak lengkap.";
}
?>
