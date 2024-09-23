<?php
include "../../db.php";
session_start();
$kode = $_GET['kode'];
$q_cek = mysqli_query($conn, "SELECT * FROM selesai WHERE id_cus='{$_SESSION['id_cus']}' AND status_pengiriman='belum dikirim'");
$cek = mysqli_num_rows($q_cek);
if ($cek >= 1) {
    header("location:home.php?hal=selesai&pesan=belum dikirim");
} else {
    mysqli_query($conn, "UPDATE selesai SET status_pengiriman='diterima' WHERE id_cus='{$_SESSION['id_cus']}' AND kode_beli='$kode'");
    header("location:home.php");
}
?>
