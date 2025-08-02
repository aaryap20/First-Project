<?php
$host = "localhost";
$user = "root";       // Change if different
$pass = "";  
$db = "enquiry";         // Change if you use a DB password

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$specialization = $_POST['specialization'];
$experience = $_POST['experience'];
$bar_no = $_POST['bar_no'];
$address = $_POST['address'];

$sql = "INSERT INTO lawyers (name, phone, email, gender, dob, specialization, experience, bar_no, address)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssiss", $name, $phone, $email, $gender, $dob, $specialization, $experience, $bar_no, $address);

if ($stmt->execute()) {
    echo "Lawyer registered successfully.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
