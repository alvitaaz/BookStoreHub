<?php
include "../../db.php";

// ini buat mastiin  id_buku telah diberikan dan tidak kosong
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id_buku = $_GET['id'];


    $query_delete_buku = mysqli_query($conn, "DELETE FROM buku WHERE id_buku='$id_buku'");
    $query_delete_stok = mysqli_query($conn, "DELETE FROM stok WHERE id_buku='$id_buku'");

    if($query_delete_buku && $query_delete_stok) {
        header('Location: buku.php');
        exit(); // buat ngehentiin eksekusi kode selanjutnya setelah redirect
    } else {
        echo "Gagal menghapus buku.";
    }
} else {
    echo "ID buku tidak valid.";
}
?>
