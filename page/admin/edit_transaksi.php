<?php
include "../../db.php";

// Pastikan parameter 'id' dari $_GET telah diset
$kd = isset($_GET['id']) ? $_GET['id'] : '';

// Jika 'id' sudah diset, jalankan query untuk mendapatkan data transaksi
if (!empty($kd)) {
    $query = mysqli_query($conn, "SELECT * FROM selesai WHERE kode_beli='$kd'");
    
    // Periksa apakah ada hasil dari query
    if (mysqli_num_rows($query) > 0) {
        $r = mysqli_fetch_array($query);
        $id_cus = $r['id_cus'];
        
        // Dapatkan data pelanggan berdasarkan id_cus
        $query_customer = mysqli_query($conn, "SELECT * FROM customer WHERE id_cus='$id_cus'");
        $data_customer = mysqli_fetch_array($query_customer);
        $nama_customer = isset($data_customer['nama_cus']) ? $data_customer['nama_cus'] : '';
?>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="text-align:center;background:#4682b5;color:#fff;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Edit Transaction Data</h4>
            </div>
            <div class="modal-body">
                <form action="p_edit_transaksi.php?a=status transaksi" name="modal_popup" enctype="multipart/form-data" method="POST">
                    <div class="form-group">
                        <label for="Modal Name">Customer Name</label>
                        <input type="hidden" name="kd" class="form-control" value="<?php echo $r['kode_beli']; ?>" />
                        <input type="text" name="nama_cus" class="form-control" value="<?php echo $nama_customer; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Transaction Status</label>
                        <select name="status_transaksi" class="form-control">
                            <option selected><?php echo $r['status_beli']; ?></option>
                            <option>order</option>
                            <option>paid</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" type="submit">Confirm</button>
                        <button type="reset" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php 
    } // Akhir dari periksa jumlah baris hasil query
} // Akhir dari periksa $kd
?>
