<?php
include "../../db.php";
$kd = $_GET['id'];

// Inisialisasi koneksi ke database
$koneksi = mysqli_connect('localhost', 'root', '', 'bookselling');
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Persiapan query untuk mengambil data stok berdasarkan id buku
$stmt = $koneksi->prepare("SELECT * FROM stok WHERE id_buku=?");
$stmt->bind_param("i", $kd);
$stmt->execute();
$result = $stmt->get_result();

while ($r = $result->fetch_assoc()) {
?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header" style="text-align:center;background:#4682b5;color:#fff;">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edit Jumlah Stok</h4>
        </div>

        <div class="modal-body">
            <form action="p_edit_stok.php" name="modal_popup" enctype="multipart/form-data" method="POST">
                <div class="form-group" style="padding-bottom: 20px;">
                    <label for="Modal Name">Jumlah Stok</label>
                    <input type="hidden" name="id_buku" class="form-control" value="<?php echo $r['id_buku']; ?>" />
                    <input type="number" name="stok" class="form-control" value="<?php echo $r['stok']; ?>" />
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="submit">
                        Confirm
                    </button>
                    <button type="reset" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>
