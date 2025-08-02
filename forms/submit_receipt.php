<?php
require 'db_receipt.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $receipt_no = $_POST['receipt_no'];
    $receipt_date = $_POST['receipt_date'];
    $received_from = $_POST['received_from'];
    $amount = $_POST['amount'];
    $payment_mode = $_POST['payment_mode'];
    $details = $_POST['details'];

    $sql = "INSERT INTO receipts (receipt_no, receipt_date, received_from, amount, payment_mode, details) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Prepare failed: " . $conn->error); // DEBUG LINE
}
$stmt->bind_param("ssssss", $receipt_no, $receipt_date, $received_from, $amount, $payment_mode, $details);


    if ($stmt->execute()) {
        echo "<script>alert('Receipt submitted successfully!'); window.location.href='display_receipt.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
