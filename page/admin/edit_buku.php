<?php
// mendefinisikan  variabel $servername with alamat server database
$servername = "localhost";

include "../../db.php";
$kd = $_GET['id'];

// use koneksi MySQLi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mendapatkan data buku berdasarkan id
$qry = $conn->prepare("SELECT * FROM buku WHERE id_buku = ?");
$qry->bind_param("s", $kd);
$qry->execute();
$result = $qry->get_result();

// buat meriksa ni apa data ditemukan
if ($result->num_rows > 0) {
    // Loop untuk menampilkan data buku
    while ($r = $result->fetch_assoc()) {
?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header" style="text-align:center;background:#4682b5;color:#fff;">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edit the book</h4>
        </div>
        <div class="modal-body">
            <form action="p_edit_buk.php" name="modal_popup" enctype="multipart/form-data" method="POST">
                <div class="form-group" style="padding-bottom: 10px;">
                    <label for="Modal Name">Category</label>
                    <select class="form-control" name="kategori">
                        <?php
                        // Query untuk mendapatkan kategori buku
                        $idkat = $r['id_kategori'];
                        $qrykat = $conn->prepare("SELECT * FROM kategori WHERE id_kategori = ?");
                        $qrykat->bind_param("s", $idkat);
                        $qrykat->execute();
                        $resultKat = $qrykat->get_result();
                        
                        // periksa apaka data kategori ditemukan
                        if ($resultKat->num_rows > 0) {
                            while ($kat = $resultKat->fetch_assoc()) {
                                echo "<option selected>" . $kat['kategori'] . "</option>";
                            }
                        }

                        // Query untuk mendapatkan semua kategori
                        $q_allkat = $conn->query("SELECT * FROM kategori");
                        if ($q_allkat->num_rows > 0) {
                            while ($kat1 = $q_allkat->fetch_assoc()) {
                                echo "<option>" . $kat1['kategori'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <!-- Form input untuk judul buku -->
                <div class="form-group" style="padding-bottom: 10px;">
                    <label for="Modal Name">Book title</label>
                    <input type="hidden" name="id_buku" class="form-control" value="<?php echo $r['id_buku']; ?>" />
                    <input type="text" name="judul" class="form-control" value="<?php echo $r['judul']; ?>" />
                </div>
                <!-- Form input untuk pengarang buku -->
                <div class="form-group" style="padding-bottom: 10px;">
                    <label for="Modal Name">Author</label>
                    <input type="text" name="pengarang" class="form-control" value="<?php echo $r['pengarang']; ?>" />
                </div>
                <!-- Form input untuk penerbit buku -->
                <div class="form-group" style="padding-bottom: 10px;">
                    <label for="Modal Name">Publisher</label>
                    <input type="text" name="penerbit" class="form-control" value="<?php echo $r['penerbit']; ?>" />
                </div>
                <!-- Form input untuk harga buku -->
                <div class="form-group" style="padding-bottom: 10px;">
                    <label for="Modal Name">Book Prices</label>
                    <input type="text" name="harga" class="form-control" value="<?php echo $r['harga']; ?>" />
                </div>
                <!-- Form input untuk deskripsi buku -->
                <div class="form-group" style="padding-bottom: 10px;">
                    <label for="Modal Name">Description</label>
                    <input type="text" name="deskripsi" class="form-control" value="<?php echo $r['deskripsi']; ?>" />
                </div>
                <!-- Form input untuk jumlah halaman buku -->
                <div class="form-group" style="padding-bottom: 10px;">
                    <label for="Modal Name">Number of pages</label>
                    <input type="text" name="halaman" class="form-control" value="<?php echo $r['hal']; ?>" />
                </div>
                <!-- Form input untuk gambar buku -->
                <div class="form-group" style="padding-bottom: 10px;">
                    <label for="Modal Name">Book Image</label>
                    <input type="file" name="gambar" value="<?php echo $r['gambar']; ?>" />
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
<?php 
    } // tutup while
} else {
    echo "Buku tidak ditemukan.";
}
?>
