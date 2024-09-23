<?php
include "../../db.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$query_kode_beli = $conn->query("SELECT * FROM selesai WHERE id_cus='{$_SESSION['id_cus']}' && (status_beli='order' || status_beli='lunas') && (status_pengiriman='belum dikirim' || status_pengiriman='dikirim')");
$data_kode_beli = $query_kode_beli->fetch_assoc();
$kode_beli = $data_kode_beli['kode_beli'];

$qryselesai = $conn->query("SELECT * FROM pembelian WHERE kode_beli='$kode_beli'");
$qrytujuan = $conn->query("SELECT * FROM tujuan WHERE kode_beli='$kode_beli'");
$datatujuan = $qrytujuan->fetch_assoc();
$qrybayar = $conn->query("SELECT * FROM selesai WHERE kode_beli='$kode_beli'");
$databayar = $qrybayar->fetch_assoc();

$pesan = isset($_GET['pesan']) ? $_GET['pesan'] : '';

if ($pesan == "belum dikirim") {
    echo "<script type='text/javascript'>alert('barang anda lho belum dikirim... :-D atau anda belum bayar');</script>";
}
?>
<div class="hdkeranjang">
    Tahap Akhir Pembayaran
</div>
<center><h2>terima kasih telah melakukan order di kedaiku.com </h2></center>
<p>Data Penerima</p>
<p>Tanggal order : <?php echo date($databayar['tgl_order']); ?></p>
<p>Nama Penerima : <?php echo isset($datatujuan['nama_penerima']) ? htmlspecialchars($datatujuan['nama_penerima']) : ''; ?></p>
<p>Provinsi : <?php echo isset($datatujuan['provinsi']) ? htmlspecialchars($datatujuan['provinsi']) : ''; ?>, tarif (Rp.<?php echo isset($datatujuan['tarif']) ? number_format(floatval($datatujuan['tarif'])) : '0'; ?>,-)</p>
<p>Kabupaten : <?php echo isset($datatujuan['kabupaten']) ? htmlspecialchars($datatujuan['kabupaten']) : ''; ?></p>
<p>Kecamatan : <?php echo isset($datatujuan['kecamatan']) ? htmlspecialchars($datatujuan['kecamatan']) : ''; ?></p>
<p>Desa : <?php echo isset($datatujuan['desa']) ? htmlspecialchars($datatujuan['desa']) : ''; ?></p>
<p>Rw : <?php echo isset($datatujuan['rw']) ? htmlspecialchars($datatujuan['rw']) : ''; ?></p>
<p>Rt : <?php echo isset($datatujuan['rt']) ? htmlspecialchars($datatujuan['rt']) : ''; ?></p>
<p>no rumah : <?php echo isset($datatujuan['no_rumah']) ? htmlspecialchars($datatujuan['no_rumah']) : ''; ?></p>
<p>no telp : <?php echo isset($datatujuan['no_telp']) ? htmlspecialchars($datatujuan['no_telp']) : ''; ?></p>
<p>Data order anda adalah sebagai berikut:</p>
<table class="table table-bordered">
    <th>Judul Buku</th>
    <th>Harga</th>
    <th>Qty</th>
    <th>Subtotal</th>
    <?php while ($dataselesai = $qryselesai->fetch_assoc()) { ?>
        <tr>
            <td><?php $qrybuku = $conn->query("SELECT * from buku where id_buku='{$dataselesai['id_buku']}'"); $databuku = $qrybuku->fetch_assoc(); echo isset($databuku['judul']) ? htmlspecialchars($databuku['judul']) : ''; ?></td>
            <td><?php echo is_numeric($dataselesai['harga']) ? number_format($dataselesai['harga']) : ''; ?></td>
            <td><?php echo is_numeric($dataselesai['qty']) ? $dataselesai['qty'] : ''; ?></td>
            <td><?php echo is_numeric($dataselesai['total_harga']) ? 'Rp.' . number_format($dataselesai['total_harga']) . ',-' : ''; ?></td>
        </tr>
    <?php } ?>
    <tr>
        <td colspan="2"></td>
        <td>Tarif Pengiriman</td>
        <td><?php echo isset($datatujuan['tarif']) ? 'Rp.' . number_format(floatval($datatujuan['tarif'])) . ',-' : '0'; ?></td>
    </tr>
    <tr>
        <td colspan="2"></td>
        <td>Total Pembayaran</td>
        <td><?php echo isset($databayar['total_bayar']) ? 'Rp.' . number_format(floatval($databayar['total_bayar'])) . ',-' : '0'; ?></td>
    </tr>
</table>
<p>Silahkan transfer uang sejumlah <b><?php echo isset($databayar['total_bayar']) ? 'Rp.' . number_format(floatval($databayar['total_bayar'])) . ',-' : '0'; ?></b> ke no-rek 65345521 atas nama kedaiku</p>
<p>Anda dapat mengonfirmasi pembayaran ke:</p>
<p> no telp <b>(0314) 234 213</b></p>
<p>BBM <b>54AA12B</b></p>
<p>WA <b>082112350251</b></B></p>
<p>*Jika 2 hari tidak dilakukan konfirmasi(belum membayar) maka transaksi anda akan kami batalkan</p>
<p>*Perlu kami ingatkan, bahwa anda tidak akan dapat melakukan pembelian dalam jangka waktu 2 hari (proses tunggu pembayaran dan konfirmasi)</p>
<p>*Anda dapat melakukan pembelian kembali setelah melakukan pembayaran dan konfirmasi, atau setelah waktu tunggu 2 hari</p>
<p>*Jika barang sudah anda terima, silahkan lakukan <a href="konfirmasi_terima.php?kode=<?php echo isset($kode_beli) ? $kode_beli : ''; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-check"></span> Konfirmasi</a>
