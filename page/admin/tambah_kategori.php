<?php
include "../../db.php";

// Periksa apakah variabel kategori tersedia dalam POST
if(isset($_POST['kategori'])){
    // Ambil nilai kategori dari formulir
    $kategori = $_POST['kategori'];

    // Sambungkan ke database
    $conn = mysqli_connect('localhost', 'root', '', 'bookselling');

    // Periksa koneksi
    if (!$conn) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }

    // Persiapkan pernyataan SQL untuk menyisipkan data kategori
    $query = "INSERT INTO kategori (kategori) VALUES (?)";

    // Persiapkan pernyataan
    $stmt = mysqli_prepare($conn, $query);

    // Bind parameter
    mysqli_stmt_bind_param($stmt, "s", $kategori);

    // Jalankan pernyataan
    if (mysqli_stmt_execute($stmt)) {
        // Redirect ke halaman kategori setelah berhasil menyisipkan kategori
        header("location:kategori.php");
        exit();
    } else {
        // Jika terjadi kesalahan saat menjalankan pernyataan
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

    // Tutup pernyataan
    mysqli_stmt_close($stmt);

    // Tutup koneksi database
    mysqli_close($conn);
} else {
    // Jika variabel kategori tidak tersedia dalam POST
    echo "Data kategori tidak tersedia.";
}
?>
