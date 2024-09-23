<?php
// Establish connection
$conn = new mysqli("localhost", "root", "", "bookselling");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data
$query_tanggal = $conn->query("SELECT * FROM tatable");
$no = 1; // initialize variable
$count = 0; // initialize variable
if ($query_tanggal) {
    while($data = $query_tanggal->fetch_assoc()) {
        $qrycus = $conn->prepare("SELECT * FROM customer WHERE id_cus=?");
        $qrycus->bind_param("i", $data['id_cus']);
        $qrycus->execute();
        $result = $qrycus->get_result();
        
        if($result && $result->num_rows > 0) {
            $datacus = $result->fetch_assoc();
            $nama = $datacus['nama_cus'];
            ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $nama; ?></td>
                <td><?php echo $data['status_pengiriman'] ?></td>
                <td><?php echo $data['tgl_order'] ?></td>
                <td>
                    <a href="#" class='tujuan btn btn-success' id='<?php echo  $data['kode_beli']; ?>'>Alamat Pengiriman</a>
                    <a href="#" class='edit btn btn-primary' id='<?php echo  $data['kode_beli']; ?>'>Edit</a>
                </td>
            </tr>
            <?php
            $count++;
        }
        $qrycus->close();
    }
} else {
    echo "Error executing query: " . $conn->error;
}

// Close connection
$conn->close();
?>
