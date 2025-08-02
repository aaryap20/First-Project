<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "enquiry";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM lawyers";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Lawyer Records</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
  <h2 class="mb-4">Registered Lawyers</h2>
  <table class="table table-bordered table-hover">
    <thead class="table-light">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Gender</th>
        <th>DOB</th>
        <th>Specialization</th>
        <th>Experience</th>
        <th>Bar No</th>
        <th>Address</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= $row['name'] ?></td>
          <td><?= $row['phone'] ?></td>
          <td><?= $row['email'] ?></td>
          <td><?= $row['gender'] ?></td>
          <td><?= $row['dob'] ?></td>
          <td><?= $row['specialization'] ?></td>
          <td><?= $row['experience'] ?></td>
          <td><?= $row['bar_no'] ?></td>
          <td><?= $row['address'] ?></td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</body>
</html>

<?php
$conn->close();
?>
