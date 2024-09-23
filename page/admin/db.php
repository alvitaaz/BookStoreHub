<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "bookselling";

// membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// meriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
