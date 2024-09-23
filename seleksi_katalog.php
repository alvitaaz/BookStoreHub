<?php
include "db.php"; // Masukkan file db.php untuk dapet koneksi ke database
?>

<div class="hdnav">
    Katalog
</div>
<ul class="kategori">
    <?php 
    // Eksekusi query dan dapatkan hasilnya
    $result = mysqli_query($conn, "SELECT * FROM katalog");
    
    // Periksa  query berhasil dieksekusi ato ngga
    if ($result) {
        // Loop untuk mengambil setiap baris hasil query
        while ($a = mysqli_fetch_array($result)) {
    ?>
    <li><a href="index.php?katalog=<?php echo $a['id_katalog'] ?>&kategori=<?php echo $a['id_kategori'] ?>"><span class="glyphicon glyphicon-list"></span> <?php echo $a['katalog'] ?></a></li>
    <?php 
        }
        // Bebaskan hasil setelah penggunaan
        mysqli_free_result($result);
    } else {
        // Tampilkan pesan kesalahan jika query gagal
        echo "Query tidak berhasil dieksekusi.";
    }
    ?>
</ul>
