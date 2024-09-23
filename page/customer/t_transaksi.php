<?php
include "../../db.php";
session_start();

// Periksa $_SESSION['id_cus'] udah diatur sebelum digunakan
if(isset($_SESSION['id_cus'])) {
    // mau mastiin variabel $_POST['id_buku'], $_POST['qty'], dan $_POST['harga'] udah terdefinisi sebelum mengaksesnya
    $id_buku = isset($_POST['id_buku']) ? $_POST['id_buku'] : null;
    $qty = isset($_POST['qty']) ? $_POST['qty'] : null;
    $harga = isset($_POST['harga']) ? $_POST['harga'] : null;

    // mau periksa semua variabel udah terdefinisi
    if($id_buku && $qty !== null && $harga !== null) {
        $query_kode_beli = $conn->query("SELECT * FROM selesai WHERE id_cus='{$_SESSION['id_cus']}' && status_beli='order'");
        $data_kode_beli = $query_kode_beli->fetch_assoc();
        $kode_beli = $data_kode_beli['kode_beli'];

        $query_cek_keranjang = $conn->query("SELECT * FROM keranjang WHERE id_cus='{$_SESSION['id_cus']}' && kode_beli='$kode_beli'");
        $cek_keranjang = $query_cek_keranjang->num_rows;

        $query_stok = $conn->query("SELECT * FROM stok WHERE id_buku='$id_buku'");
        $data_stok = $query_stok->fetch_assoc();
        $stok = $data_stok['stok'];
        $stok_ubah = $stok - $qty;

        $query_id_buku = $conn->query("SELECT * FROM keranjang WHERE id_cus='{$_SESSION['id_cus']}' && kode_beli='$kode_beli' && id_buku='$id_buku'");
        $data_id_buku = $query_id_buku->fetch_assoc();
        $idbuku = $data_id_buku['id_buku'];

        if($cek_keranjang >= 1) {
            if($id_buku == $idbuku) {
                $query_keranjang = $conn->query("SELECT * FROM keranjang WHERE id_cus='{$_SESSION['id_cus']}' && kode_beli='$kode_beli' && id_buku='$id_buku'");
                $data_keranjang = $query_keranjang->fetch_assoc();
                $qty_asli = $data_keranjang['qty'];
                $qty_ubah = $qty_asli + $qty;
                $total_harga_ubah = $harga * $qty_ubah;
                
                $conn->query("UPDATE keranjang SET qty='$qty_ubah', total_harga='$total_harga_ubah' WHERE id_buku='$id_buku'");
                $conn->query("UPDATE pembelian SET qty='$qty_ubah', total_harga='$total_harga_ubah' WHERE id_buku='$id_buku'");
                header("location:home.php?hal=keranjang");
            } else {
                $conn->query("INSERT INTO keranjang SET kode_beli='$kode_beli', id_cus='{$_SESSION['id_cus']}', id_buku='$id_buku', qty='$qty', harga='$harga', total_harga='$total_harga'");
                $conn->query("INSERT INTO pembelian SET kode_beli='$kode_beli', id_cus='{$_SESSION['id_cus']}', id_buku='$id_buku', qty='$qty', harga='$harga', total_harga='$total_harga'");
                header("location:home.php?hal=keranjang");
            }
        } else if($cek_keranjang == 0) {
            $kode = rand();
            $conn->query("INSERT INTO selesai SET kode_beli='$kode', id_cus='{$_SESSION['id_cus']}'");
            $conn->query("INSERT INTO keranjang SET kode_beli='$kode', id_cus='{$_SESSION['id_cus']}', id_buku='$id_buku', qty='$qty', harga='$harga', total_harga='$total_harga'");
            $conn->query("INSERT INTO pembelian SET kode_beli='$kode', id_cus='{$_SESSION['id_cus']}', id_buku='$id_buku', qty='$qty', harga='$harga', total_harga='$total_harga'");
            header("location:home.php?hal=keranjang");
        }
    } else {
        echo "Data tidak lengkap.";
    }
} else {
    echo "Session id_cus tidak diatur.";
}
?>
