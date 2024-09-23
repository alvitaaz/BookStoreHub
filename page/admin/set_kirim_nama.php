<?php
$nama = isset($_POST['nama']) ? $_POST['nama'] : ''; // Memeriksa apakah data POST sudah tersedia

// koneksi ke database
$koneksi = mysqli_connect('localhost', 'root', '', 'bookselling');

// Periksa koneksi
if (mysqli_connect_errno()) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$query = mysqli_query($koneksi, "SELECT * FROM customer WHERE nama_cus LIKE '%$nama%'");

// Periksa apakah query berhasil dieksekusi
if ($query) {
    while ($data = mysqli_fetch_array($query)) {
        $query_id = mysqli_query($koneksi, "SELECT * FROM selesai WHERE id_cus='$data[id_cus]'");
        while ($datal = mysqli_fetch_array($query_id)) {
            $qrycus = mysqli_query($koneksi, "SELECT * FROM customer WHERE id_cus='$data[id_cus]'");
            $datacus = mysqli_fetch_array($qrycus);
            $nama_customer = $datacus['nama_cus'];
?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $nama_customer; ?></td>
                <td><?php echo $datal['status_pengiriman'] ?></td>
                <td><?php echo $datal['tgl_order'] ?></td>
                <td>
                    <a href="#" class='tujuan btn btn-success' id='<?php echo $data['kode_beli']; ?>'>Alamat Pengiriman</a>
                    <a href="#" class='edit btn btn-primary' id='<?php echo $data['kode_beli']; ?>'>Edit</a>
                </td>
            </tr>
<?php
            $i++;
            $count++;
        }
    }
} else {
    echo "Query gagal dieksekusi: " . mysqli_error($koneksi);
}

// Tutup koneksi
mysqli_close($koneksi);
?>
