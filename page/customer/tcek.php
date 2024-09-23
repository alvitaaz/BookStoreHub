<?php
include "../../db.php";

$kode_beli = $_POST['kode_beli'];
$penerima = $_POST['penerima'];
$provinsi = $_POST['provinsi'];
$kabupaten = $_POST['kabupaten'];
$kecamatan = $_POST['kecamatan'];
$pos = $_POST['pos'];
$desa = $_POST['desa'];
$rw = $_POST['rw'];
$rt = $_POST['rt'];
$norumah = $_POST['rumah'];
$tgl_order = $_POST['a'];
$telpon = $_POST['telpon'];

// Query untuk mendapatkan tarif berdasarkan provinsi
$qry_prov = $conn->query("SELECT * FROM provinsi WHERE provinsi='$provinsi'");
$data_prov = $qry_prov->fetch_assoc();
$tarif = $data_prov['tarif'];

// Query untuk mendapatkan data pembelian berdasarkan kode_beli
$qry_selesai = $conn->query("SELECT * FROM selesai WHERE kode_beli='$kode_beli'");
$data_selesai = $qry_selesai->fetch_assoc();
$total_bayar = $data_selesai['bayar'] + $tarif + $kode_beli;

// Insert data tujuan pengiriman
$conn->query("INSERT INTO tujuan (kode_beli, nama_penerima, provinsi, kabupaten, kecamatan, desa, rw, rt, kode_pos, no_rumah, no_telp, tarif) 
VALUES ('$kode_beli', '$penerima', '$provinsi', '$kabupaten', '$kecamatan', '$desa', '$rw', '$rt', '$pos', '$norumah', '$telpon', '$tarif')");

// Update data pembelian dengan total bayar dan tanggal order
$conn->query("UPDATE selesai SET total_bayar='$total_bayar', tgl_order='$tgl_order' WHERE kode_beli='$kode_beli'");

// Hapus data dari keranjang berdasarkan kode_beli
$conn->query("DELETE FROM keranjang WHERE kode_beli='$kode_beli'");

// Redirect ke halaman selesai
header("location:home.php?hal=selesai");
?>
