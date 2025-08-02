<?php
// DB connection
$servername = "localhost";
$username = "root";
$password = ""; // change if your XAMPP/MySQL has password
$dbname = "enquiry"; // update with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form values
$case_title     = $_POST['case_title'];
$case_number    = $_POST['case_number'];
$client_name    = $_POST['client_name'];
$lawyer_name    = $_POST['lawyer_name'];
$case_type      = $_POST['case_type'];
$filing_date    = $_POST['filing_date'];
$court_name     = $_POST['court_name'];
$status         = $_POST['status'];
$hearing_date   = $_POST['hearing_date'];
$description    = $_POST['description'];

// Prepare and bind to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO cases (case_title, case_number, client_name, lawyer_name, case_type, filing_date, court_name, status, hearing_date, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssss", $case_title, $case_number, $client_name, $lawyer_name, $case_type, $filing_date, $court_name, $status, $hearing_date, $description);

// Execute
if ($stmt->execute()) {
    echo "<script>alert('Case submitted successfully'); window.location.href='Case.php';</script>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
