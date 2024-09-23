<?php
// Konfigurasi database
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'bookselling';

// Koneksi ke database
$conn = mysqli_connect($hostname, $username, $password, $dbname);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Konstruksi query SQL dengan operasi JOIN
$sql = "SELECT t.*, c.nama_cus 
        FROM status_transaksi t 
        JOIN customer c ON t.id_cus = c.id_cus";

// Eksekusi query
$query_status_transaksi = mysqli_query($conn, $sql);

// Periksa apakah query berhasil
if (!$query_status_transaksi) {
    die("Query error: " . mysqli_error($conn));
}

// Inisialisasi variabel
$no = 1;
$count = 0;

// Ambil dan tampilkan data
while ($data = mysqli_fetch_array($query_status_transaksi)) {
    ?>
    <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo htmlspecialchars($data['nama_cus']); ?></td>
        <td><?php echo htmlspecialchars($data['status_beli']); ?></td>
        <td><?php echo htmlspecialchars($data['tgl_order']); ?></td>
        <td>
            <a href="#" class='detail_order btn btn-info' id='<?php echo htmlspecialchars($data['id_selesai']); ?>'>Detail Order</a>
            <a href="#" class='edit btn btn-primary' id='<?php echo htmlspecialchars($data['id_selesai']); ?>'>Edit</a>
            <a href="#" onclick="confirm_modal('del_transaksi.php?&id=<?php echo urlencode($data['id_selesai']); ?>');" class="btn btn-danger">Delete</a>
        </td>
    </tr>
    <?php
    $count++;
}
?>
