<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'bookselling';

$conn = mysqli_connect($hostname, $username, $password, $dbname) or die ('failed connect to Database');
?>
