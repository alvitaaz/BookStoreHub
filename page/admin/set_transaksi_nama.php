<?php
// Establish connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "bookselling";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$nama = $_POST['nama'];

// Prepare statement to avoid SQL injection
$query = $conn->prepare("SELECT * FROM customer WHERE nama_cus LIKE ?");
$query->bind_param("s", $nama);
$query->execute();
$result = $query->get_result();

while ($data = $result->fetch_assoc()) {
    $query_id = $conn->prepare("SELECT * FROM selesai WHERE id_cus=?");
    $query_id->bind_param("i", $data['id_cus']);
    $query_id->execute();
    $result_id = $query_id->get_result();

    while ($datal = $result_id->fetch_assoc()) {
        // Output data
        echo "<tr>";
        echo "<td>" . $no++ . "</td>";
        echo "<td>" . $data['nama_cus'] . "</td>";
        
        // Check if id_selesai key exists in $datal array
        if (array_key_exists('id_selesai', $datal)) {
            echo "<td>" . $datal['id_selesai'] . "</td>"; // Example usage of id_selesai
            echo "<td>" . $datal['status_beli'] . "</td>";
            echo "<td>" . $datal['tgl_order'] . "</td>";
            echo "<td>";
            echo "<a href='#' class='detail_order btn btn-info' id='" . $datal['id_selesai'] . "'>Detail Order</a>";
            echo "<a href='#' class='edit btn btn-primary' id='" . $datal['id_selesai'] . "'>Edit</a>";
            echo "<a href='#' onclick=\"confirm_modal('del_transaksi.php?id=" . $datal['id_selesai'] . "');\" class='btn btn-danger'>Delete</a>";
            echo "</td>";
        } else {
            // Handle the case where id_selesai key is not present in $datal array
            echo "<td colspan='4'>id_selesai not found</td>";
        }
        
        echo "</tr>";
    }
}

// Close connection
$conn->close();
?>
