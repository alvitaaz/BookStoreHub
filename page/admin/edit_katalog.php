<?php
include "../../db.php";
$kd = $_GET['id'];

// Inisialisasi koneksi ke database
$koneksi = mysqli_connect('localhost', 'root', '', 'bookselling');
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Persiapan query untuk mengambil data katalog berdasarkan id katalog
$stmt = $koneksi->prepare("SELECT * FROM katalog WHERE id_katalog=?");
$stmt->bind_param("i", $kd);
$stmt->execute();
$result = $stmt->get_result();

while ($r = $result->fetch_assoc()) {
?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header" style="text-align:center;background:#4682b5;color:#fff;">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edit Data Katalog</h4>
        </div>

        <div class="modal-body">
            <form action="p_edit_katalog.php" name="modal_popup" enctype="multipart/form-data" method="POST">
                
                <div class="form-group" style="padding-bottom: 20px;">
                    <label for="Modal Name">Katalog</label>
                    <input type="hidden" name="id_katalog" class="form-control" value="<?php echo $r['id_katalog']; ?>" />
                    <input type="text" name="katalog" class="form-control" value="<?php echo $r['katalog']; ?>" />
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
