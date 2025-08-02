<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $case_type = $_POST['case_type'];
  $case_description = $_POST['case_description'];
  $registration_date = $_POST['registration_date'];

  $sql = "INSERT INTO clients (name, phone, email, address, case_type, case_description, registration_date)
          VALUES (?, ?, ?, ?, ?, ?, ?)";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sssssss", $name, $phone, $email, $address, $case_type, $case_description, $registration_date);

  if ($stmt->execute()) {
    echo "<script>alert('Client registered successfully!'); window.location.href='client_list.php';</script>";
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
  $conn->close();
}
?>
