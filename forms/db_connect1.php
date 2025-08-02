<?php
$host = "localhost";
$user = "root";
$password = ""; // Update if you have a DB password
$database = "enquiry"; // Change to your DB name

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
