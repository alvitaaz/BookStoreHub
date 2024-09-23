<?php
include "../../db.php";

// Mengambil nilai yang diposting dari formulir pencarian
if(isset($_POST['cari'])){
    $search = mysqli_real_escape_string($conn, $_POST['cari']);
    
    // Memastikan bahwa nilai yang diposting bukan string kosong
    if(!empty($search)){
        // Mengarahkan pengguna ke halaman home.php dengan aksi pencarian
        header("location:home.php?aksi=cari&search=$search");
        exit; // Memastikan tidak ada kode berikutnya yang dieksekusi
    } else {
        // Tangani kasus ketika nilai pencarian kosong
        echo "Pencarian tidak boleh kosong";
        // Redirect pengguna ke halaman yang sesuai atau lakukan tindakan lain sesuai kebutuhan
        exit; // Memastikan tidak ada kode berikutnya yang dieksekusi
    }
} else {
    // Tangani kasus ketika data pencarian tidak tersedia
    echo "Data pencarian tidak ditemukan";
    // Redirect pengguna ke halaman yang sesuai atau lakukan tindakan lain sesuai kebutuhan
    exit; // Memastikan tidak ada kode berikutnya yang dieksekusi
}
?>
