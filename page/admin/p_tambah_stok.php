<?php
include "../../db.php";

if(isset($_POST['id_buku'], $_POST['stok'])) {
    // tangkap nilai $_POST['id_buku'] dan $_POST['stok']
    $id_buku = $_POST['id_buku'];
    $stok = $_POST['stok'];
    
    $koneksi = mysqli_connect('localhost', 'root', '', 'bookselling');

    if (!$koneksi) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }
    
    // Query buat nambahindata ke tabel stok
    $query = "INSERT INTO stok (id_buku, stok) VALUES ('$id_buku', '$stok')";
    
    // eksekusi query
    if(mysqli_query($koneksi, $query)) {
        // redirect ke halaman buku.php kaloo query berhasil
        header("location: buku.php");
    } else {
        // tampilkan pesan error kaloquery gagal
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
    
    // tutupkoneksi database
    mysqli_close($koneksi);
} else {
    // nampilin pesan kalo data $_POST ga diatur dengan benar
    echo "Data tidak lengkap.";
}
?>
