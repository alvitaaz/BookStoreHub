<?php
include "../../db.php"; 

$kd = $_POST['kd'];
$a = isset($_GET['a']) ? $_GET['a'] : '';

if ($a == 'status_kirim') {
    $status_kirim = $_POST['status_kirim'];

    // Update status pengiriman
    $query_update_pengiriman = "UPDATE selesai SET status_pengiriman=? WHERE kode_beli=?";
    if ($stmt_pengiriman = mysqli_prepare($conn, $query_update_pengiriman)) {
        mysqli_stmt_bind_param($stmt_pengiriman, "ss", $status_kirim, $kd);
        $result_pengiriman = mysqli_stmt_execute($stmt_pengiriman);
        mysqli_stmt_close($stmt_pengiriman);

        if ($result_pengiriman) {
            header('Location: pengiriman.php');
            exit();
        } else {
            echo "Gagal memperbarui status pengiriman: " . mysqli_error($conn);
        }
    } else {
        echo "Query preparation failed: " . mysqli_error($conn);
    }
} elseif ($a == 'status_transaksi') {
    $status_beli = $_POST['status_transaksi'];

    // Update status transaksi
    $query_update_transaksi = "UPDATE selesai SET status_beli=? WHERE kode_beli=?";
    if ($stmt_transaksi = mysqli_prepare($conn, $query_update_transaksi)) {
        mysqli_stmt_bind_param($stmt_transaksi, "ss", $status_beli, $kd);
        $result_transaksi = mysqli_stmt_execute($stmt_transaksi);
        mysqli_stmt_close($stmt_transaksi);

        if ($result_transaksi) {
            header('Location: transaksi.php');
            exit();
        } else {
            echo "Gagal memperbarui status transaksi: " . mysqli_error($conn);
        }
    } else {
        echo "Query preparation failed: " . mysqli_error($conn);
    }
}
?>
