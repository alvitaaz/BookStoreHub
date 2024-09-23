<?php
include "../../db.php";
$kd = $_GET['id'];

// koneksi ini menggunakan mysqli
$conn = new mysqli('localhost', 'root', '', 'bookselling');

// cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// query buat ngitung total bayar
$byr_query = $conn->query("SELECT SUM(total_harga) as total_bayar FROM pembelian WHERE kode_beli='$kd'");
$byr_row = $byr_query->fetch_assoc();
$b = isset($byr_row['total_bayar']) ? $byr_row['total_bayar'] : 0;

// Query buat ngitung total qty
$qtot_query = $conn->query("SELECT SUM(qty) as qty_total FROM pembelian WHERE kode_beli='$kd'");
$qtot_row = $qtot_query->fetch_assoc();
$c = isset($qtot_row['qty_total']) ? $qtot_row['qty_total'] : 0;
?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header" style="text-align:center;background:#4682b5;color:#fff;">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Detail Order</h4>
        </div>

        <div class="modal-body">
            <table class="table table-stiped">
                <th>book title</th>
                <th><center>Price</center></th>
                <th><center>Qty</center></th>
                <th><center>Total price</center></th>
                <?php
                $qry = $conn->query("SELECT * FROM pembelian WHERE kode_beli='$kd'");
                while($r = $qry->fetch_assoc()) { 
                    $id_buku = $r['id_buku']; 
                    $qrybuku = $conn->query("SELECT * FROM buku WHERE id_buku='$id_buku'"); 
                    $data_buku = $qrybuku->fetch_assoc(); 
                ?>
                    <tr>
                        <td><?php echo $data_buku['judul']; ?></td>
                        <td><center>Rp.<?php echo isset($r['harga']) && is_numeric($r['harga']) ? number_format($r['harga']) : 0; ?>,-</center></td>
                        <td><center><?php echo isset($r['qty']) && is_numeric($r['qty']) ? $r['qty'] : 0; ?></center></td>
                        <td><center>Rp.<?php echo isset($r['total_harga']) && is_numeric($r['total_harga']) ? number_format($r['total_harga']) : 0; ?>,-</center></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="2" style="text-align:center;"><b>Total</b></td>
                    <td><center><?php echo $c; ?></center></td>
                    <td><center>Rp.<?php echo number_format($b); ?>,-</center></td>
                </tr>
            </table>
        </div>
        <div class="modal-footer">
            <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
                back
            </button>
        </div>
    </div>
</div>
