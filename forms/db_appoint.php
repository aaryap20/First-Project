<?php
$servername = "localhost";
$username = "root";
$password = ""; // Use your DB password if set
$dbname = "enquiry"; // Change to your actual DB name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
