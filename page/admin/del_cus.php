<?php
// Include the database connection
include "../../db.php";

// Get the customer ID from the GET parameters
$kd = $_GET['id'];

// Establish connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL query to delete the customer
$sql = "DELETE FROM customer WHERE id_cus='$kd'";

// Execute the query
if ($conn->query($sql) === TRUE) {
    // Redirect to the customer page after successful deletion
    header('location:customer.php');
} else {
    // Display an error message if the deletion fails
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
