<?php
include "../../db.php";

// Validasi input ID
$kd = isset($_GET['id']) ? $_GET['id'] : '';
if (!ctype_digit($kd)) {
    // ID tidak valid, tampilkan pesan error atau do tindakan yang sesuai
    exit('Invalid ID');
}

// Periksa koneksi ke database
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// mengambil data dari database berdasarkan kode_beli
$query = mysqli_query($conn, "SELECT * FROM tujuan WHERE kode_beli='$kd'");
if (!$query) {
    die("Query error: " . mysqli_error($conn));
}

// mengambil data tujuan pengiriman
$datatujuan = mysqli_fetch_array($query);
?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header" style="text-align:center;background:#4682b5;color:#fff;">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Shipping Address</h4>
        </div>
        <div class="modal-body">
            <p>Recipient's Name : <?php echo $datatujuan['nama_penerima']; ?></p>
            <p>Province : <?php echo $datatujuan['provinsi']; ?></p>
            <p>Regency : <?php echo $datatujuan['kabupaten']; ?></p>
            <p>Subdistrict : <?php echo $datatujuan['kecamatan']; ?></p>
            <p>Village : <?php echo $datatujuan['desa']; ?></p>
            <p>Rw : <?php echo $datatujuan['rw']; ?></p>
            <p>Rt : <?php echo $datatujuan['rt']; ?></p>
            <p>House Number : <?php echo $datatujuan['no_rumah']; ?></p>
            <p>Phone Number : <?php echo $datatujuan['no_telp']; ?></p>
        </div>
        <div class="modal-footer">
            <button type="reset" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Back</button>
        </div>
    </div>
</div>
