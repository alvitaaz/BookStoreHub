<?php
include "../../db.php";

// Pengecekan session_start() untuk menghindari Notice
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$query_kode_beli = $conn->query("SELECT * FROM selesai WHERE id_cus='{$_SESSION['id_cus']}' && status_beli='order'");
$data_kode_beli = $query_kode_beli->fetch_assoc();
$kode_beli = isset($data_kode_beli['kode_beli']) ? $data_kode_beli['kode_beli'] : null;

$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : null;

if($aksi == "hapus") {
    $idker = isset($_GET['id']) ? $_GET['id'] : null;

    if($idker) {
        $qryker = $conn->query("SELECT * FROM keranjang WHERE id_keranjang='$idker'");
        $data_ker = mysqli_fetch_assoc($qryker);
        
        if($data_ker) {
            $qty1 = $data_ker['qty'];

            $qrystok = $conn->query("SELECT * FROM stok WHERE id_buku='{$data_ker['id_buku']}'");
            $data_stok = mysqli_fetch_assoc($qrystok);
            $qty2 = $data_stok['stok'];
            $stokakhir = $qty1 + $qty2;

            $conn->query("UPDATE stok SET stok='$stokakhir' WHERE id_buku='{$data_ker['id_buku']}'");
            $conn->query("DELETE FROM keranjang WHERE id_keranjang='$idker'");
            $conn->query("DELETE FROM pembelian WHERE id_keranjang='$idker'");
            header("location:home.php?hal=keranjang");
        } else {
            echo "Keranjang tidak ditemukan.";
        }
    }
}

$qrykeranjang = $conn->query("SELECT * FROM keranjang WHERE id_cus='{$_SESSION['id_cus']}' && kode_beli='$kode_beli'");

// Mengambil baris pertama dari hasil kueri untuk mengambil total harga
$row = $qrykeranjang->fetch_assoc();
$ttl_harga = isset($row['total_harga']) ? $row['total_harga'] : 0;

$byr = $conn->query("SELECT SUM(total_harga) as total_bayar FROM keranjang WHERE id_cus='{$_SESSION['id_cus']}' && kode_beli='$kode_beli'");
$qtot = $conn->query("SELECT SUM(qty) as qty_total FROM keranjang WHERE id_cus='{$_SESSION['id_cus']}' && kode_beli='$kode_beli'");
$b = mysqli_fetch_assoc($byr)['total_bayar'];
$c = mysqli_fetch_assoc($qtot)['qty_total'];

$conn->query("UPDATE selesai SET qty_total='$c', bayar='$b' WHERE id_cus='{$_SESSION['id_cus']}' && kode_beli='$kode_beli'");
?>

<div class="hdkeranjang">
    Keranjang Belanja
</div>

<table class="table table-stiped">
    <th>Judul buku</th>
    <th><center>Harga</center></th>
    <th><center>Qty</center></th>
    <th><center>Total harga</center></th>
    <th><center>Aksi</center></th>
    
    <?php 
    // Loop untuk mengambil setiap baris dari hasil kueri
    while($isi_keranjang = mysqli_fetch_assoc($qrykeranjang)){ 
    ?>
    <tr>
        <td>
            <?php 
                $id_buku = $isi_keranjang['id_buku']; 
                $qrybuku = $conn->query("SELECT * FROM buku WHERE id_buku='$id_buku'"); 
                // Periksa apakah hasil kueri mengembalikan nilai atau tidak
                if ($qrybuku) {
                    $data_buku = mysqli_fetch_assoc($qrybuku); 
                    $judul = $data_buku['judul']; 
                    echo $judul;
                } else {
                    echo "Judul tidak tersedia";
                }
            ?>
        </td>
        <td><center>Rp.<?php echo isset($isi_keranjang['harga']) ? number_format($isi_keranjang['harga']) : '0'; ?>,-</center></td>
        <td><center><?php echo isset($isi_keranjang['qty']) ? $isi_keranjang['qty'] : '0';  ?></center></td>
        <td><center>Rp.<?php echo isset($isi_keranjang['total_harga']) && !empty($isi_keranjang['total_harga']) ? number_format($isi_keranjang['total_harga']) : '0'; ?>,-</center></td>
        <td><center><a href="home.php?hal=keranjang&aksi=hapus&id=<?php echo $isi_keranjang['id_keranjang']; ?>"><span class="glyphicon glyphicon-remove"></span></a></center></td>
    </tr>
    <?php } ?>
    
    <tr>
        <td colspan="2" style="text-align:center;"><b>Total</b></td>
        <td><center><?php echo $c; ?></center></td>
        <td><center>Rp.<?php echo isset($b) ? number_format($b) : '0'; ?>,-</center></td>
        <td><center>
            <a href="home.php" class="btn btn-warning"><span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping</a>
            <a href="home.php?hal=checkout" class="btn btn-primary"><span class="glyphicon glyphicon-paste"> checkout</span></a>
        </center></td>
    </tr>
</table>
