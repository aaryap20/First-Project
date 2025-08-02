<?php
$host = "localhost";     // or your database host
$user = "root";          // your DB username
$pass = "";              // your DB password
$dbname = "enquiry";    // your database name

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
