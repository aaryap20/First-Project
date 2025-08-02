<?php
include 'db_appoint.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name   = $_POST['name'];
    $phone         = $_POST['phone'];
    $email         = $_POST['email'];
    $appointment_date = $_POST['appointment_date'];
    $appointment_time   = $_POST['appointment_time'];
    $reason       = $_POST['reason'];

    $stmt = $conn->prepare("INSERT INTO appointments (name, phone, email, appointment_date, appointment_time, reason  ) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $phone, $email, $appointment_date,  $appointment_time, $reason  );

    if ($stmt->execute()) {
        echo "<script>alert('Appointment submitted successfully.'); window.location.href='Appointment.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
