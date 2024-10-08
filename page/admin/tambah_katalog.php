<?php
include "../../db.php";

// ambil nilai dari form
$kategori = $_POST['kategori'];
$katalog = $_POST['katalog'];

// ambil ID kategori berdasarkan nama kategori
$query_kategori = mysqli_query($conn, "SELECT id_kategori FROM kategori WHERE kategori='$kategori'");
$id_kategori = mysqli_fetch_assoc($query_kategori)['id_kategori'];

// insert data ke tabel katalog
$query_insert = "INSERT INTO katalog (id_kategori, katalog) VALUES ('$id_kategori', '$katalog')";
mysqli_query($conn, $query_insert);

// redirect ke halaman katalog.php
header("location:katalog.php");
exit(); // penting buat ngehentiin  eksekusi skrip setelah redirect
?>
