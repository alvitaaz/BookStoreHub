<?php
// Masukkan file koneksi database
include "../../db.php";

// Periksa apakah data $_POST['id_buku'] dan $_POST['stok'] telah diatur
if(isset($_POST['id_buku'], $_POST['stok'])) {
    // Tangkap nilai $_POST['id_buku'] dan $_POST['stok']
    $id_buku = $_POST['id_buku'];
    $stok = $_POST['stok'];
    
    // Buat koneksi ke database
    $koneksi = mysqli_connect('localhost', 'root', '', 'bookselling');

    // Periksa koneksi database
    if (!$koneksi) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }
    
    // Query untuk menambahkan data ke tabel stok
    $query = "INSERT INTO stok (id_buku, stok) VALUES ('$id_buku', '$stok')";
    
    // Eksekusi query
    if(mysqli_query($koneksi, $query)) {
        // Redirect ke halaman buku.php jika query berhasil
        header("location: buku.php");
    } else {
        // Tampilkan pesan error jika query gagal
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
    
    // Tutup koneksi database
    mysqli_close($koneksi);
} else {
    // Tampilkan pesan jika data $_POST tidak diatur dengan benar
    echo "Data tidak lengkap.";
}
?>
