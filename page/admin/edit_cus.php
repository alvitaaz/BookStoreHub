<?php
include "../../db.php";
$id = $_GET['id'];

// Inisialisasi koneksi ke database
$koneksi = mysqli_connect('localhost', 'root', '', 'bookselling');
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Persiapan query untuk mengambil data customer berdasarkan id customer
$stmt = $koneksi->prepare("SELECT * FROM customer WHERE id_cus=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$e_cus = $result->fetch_assoc();
?>
<div class="hdkategoriadm">
    Edit Customer
</div>
<form action="" method="post" class="form-group">
    <input type="text" name="id_cus" class="form-control" style="margin:10px;" value="<?php echo $e_cus['id_cus']; ?>" readonly>
    <input type="text" name="nama_cus" class="form-control" style="margin:10px;" value="<?php echo $e_cus['nama_cus']; ?>">
    <input type="text" name="email_cus" class="form-control" style="margin:10px;" value="<?php echo $e_cus['email_cus']; ?>">
    <input type="text" name="password_cus" class="form-control" style="margin:10px;" value="<?php echo $e_cus['password_cus']; ?>">
    <input type="submit" name="edit" value="simpan" class="btn btn-success" style="margin:10px;">
</form>
<?php
@$simpan = $_POST['edit'];
if($simpan)
{
    $cos = $_POST['nama_cus'];
    $ecos = $_POST['email_cus'];
    $pcos = $_POST['password_cus'];
    $kd = $_POST['id_cus'];

    // persiapan query untuk melakukan update data customer
    $stmt = $koneksi->prepare("UPDATE customer SET nama_cus=?, email_cus=?, password_cus=? WHERE id_cus=?");
    $stmt->bind_param("sssi", $cos, $ecos, $pcos, $kd);
    $stmt->execute();

    // redirect ke halaman index.php?page=customer after data berhasil disimpan
    header("location:index.php?page=customer");
}
?>
