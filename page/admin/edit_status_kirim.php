<?php
include "../../db.php";

// Validasi input ID
$kd = isset($_GET['id']) ? $_GET['id'] : '';
if (!ctype_digit($kd)) {
    exit('Invalid ID');
}

// Periksa koneksi ke database
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil data dari database
$query = "SELECT * FROM selesai WHERE kode_beli=?";
if ($stmt = mysqli_prepare($conn, $query)) {
    mysqli_stmt_bind_param($stmt, "s", $kd);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $r = mysqli_fetch_array($result);
    mysqli_stmt_close($stmt);
    
    if (!$r) {
        die("Data tidak ditemukan.");
    }
} else {
    die("Query preparation failed: " . mysqli_error($conn));
}

// Tampilkan form edit
?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header" style="text-align:center;background:#4682b5;color:#fff;">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edit Status Kirim</h4>
        </div>
        <div class="modal-body">
            <form action="p_edit_transaksi.php?a=status_kirim" name="modal_popup" enctype="multipart/form-data" method="POST">
                <div class="form-group">
                    <label for="Modal Name">Nama Customer</label>
                    <input type="hidden" name="kd" class="form-control" value="<?php echo htmlspecialchars($r['kode_beli']); ?>" />
                    <?php
                    // Ambil nama customer dari tabel customer
                    $query_customer = "SELECT * FROM customer WHERE id_cus=?";
                    if ($stmt_customer = mysqli_prepare($conn, $query_customer)) {
                        mysqli_stmt_bind_param($stmt_customer, "s", $r['id_cus']);
                        mysqli_stmt_execute($stmt_customer);
                        $result_customer = mysqli_stmt_get_result($stmt_customer);
                        $data = mysqli_fetch_array($result_customer);
                        mysqli_stmt_close($stmt_customer);

                        $nama = htmlspecialchars($data['nama_cus']);
                    } else {
                        die("Query preparation failed: " . mysqli_error($conn));
                    }
                    ?>
                    <input type="text" name="nama_cus" class="form-control" value="<?php echo $nama; ?>" readonly />
                </div>
                <div class="form-group">
                    <label>Status Buku</label>
                    <select name="status_kirim" class="form-control">
                        <option value="belum dikirim" <?php echo ($r['status_pengiriman'] == 'belum dikirim') ? 'selected' : ''; ?>>Belum Dikirim</option>
                        <option value="dikirim" <?php echo ($r['status_pengiriman'] == 'dikirim') ? 'selected' : ''; ?>>Dikirim</option>
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
