<?php
include "../../db.php";

$id_buku = isset($_POST['id_buku']) ? $_POST['id_buku'] : null;
$kategori = isset($_POST['kategori']) ? $_POST['kategori'] : null;
$judul = isset($_POST['judul']) ? $_POST['judul'] : null;
$pengarang = isset($_POST['pengarang']) ? $_POST['pengarang'] : null;
$penerbit = isset($_POST['penerbit']) ? $_POST['penerbit'] : null;
$halaman = isset($_POST['halaman']) ? $_POST['halaman'] : null;
$harga = isset($_POST['harga']) ? $_POST['harga'] : null;
$deskripsi = isset($_POST['deskripsi']) ? $_POST['deskripsi'] : null;

$message = '';
$valid_file = true;
$max_size = 1024000; // Ukuran maksimal file yang akan diupload (dalam byte)

if ($_FILES['gambar']['name']) {
    // Jika tidak ada error...
    if (!$_FILES['gambar']['error']) {
        $new_file_name = strtolower($_FILES['gambar']['tmp_name']); //rename file menjadi huruf kecil
        if ($_FILES['gambar']['size'] > $max_size) {
            $valid_file = false;
            $message = 'Maaf, file terlalu besar. Max: 1MB';
        }

        // Mengatur format file yang boleh diupload
        $image_path = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION); //ambil extensi file
        $extension = strtolower($image_path); //rename extensi file menjadi huruf kecil

        if ($extension != "jpg" && $extension != "jpeg" && $extension != "png" && $extension != "gif") {
            $valid_file = false;
            $message = "Maaf, file yang diijinkan hanya format JPG, JPEG, PNG & GIF. #".$extension;
        }

        // jika file lolos filter
        if ($valid_file) {
            // Mengganti nama gambar
            $rename_nama_file = date('YmdHis');
            $nama_file_baru = $rename_nama_file.'.'.$extension;

            // Simpan ke database
            $stmt = $conn->prepare("UPDATE buku SET judul=?, id_kategori=?, pengarang=?, penerbit=?, hal=?, harga=?, deskripsi=?, gambar=? WHERE id_buku=?");
            $stmt->bind_param("sisssdssi", $judul, $kategori, $pengarang, $penerbit, $halaman, $harga, $deskripsi, $nama_file_baru, $id_buku);
            $stmt->execute();

            // Memindahkan gambar ke tempat yang kita inginkan
            move_uploaded_file($_FILES['gambar']['tmp_name'], '../../img/gambar_buku/'.$nama_file_baru);
            header("location:buku.php");
            exit;
        }
    } else {
        $message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['gambar']['error'];
    }
}
?>
