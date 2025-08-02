<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Case List</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- DataTables CSS -->
  <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #f4f6f9;
      font-family: 'Segoe UI', sans-serif;
    }

    .table-container {
      padding: 2rem;
      background: #fff;
      border-radius: 1rem;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
      margin-top: 2rem;
    }

    h2 {
      color: #dc3545;
      margin-bottom: 1rem;
    }

    thead {
      background-color: #ffe8cc;
    }

    tbody tr:nth-child(even) {
      background-color: #fff3e0;
    }
  </style>
</head>
<body>

<div class="container table-container">
  <h2 class="text-center">Case List</h2>
  <table id="caseTable" class="table table-bordered table-striped">
    <thead class="text-center">
      <tr>
        <th>ID</th>
        <th>Client Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Address</th>
        <th>Case Type</th>
        <th>Description</th>
        <th>Registration Date</th>
      </tr>
    </thead>
    <tbody>
      <?php
      include '../db_connect1.php';

      $sql = "SELECT * FROM cases";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        $id = 1;
        while($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>{$id}</td>";
          echo "<td>{$row['name']}</td>";
          echo "<td>{$row['phone']}</td>";
          echo "<td>{$row['email']}</td>";
          echo "<td>{$row['address']}</td>";
          echo "<td>{$row['case_type']}</td>";
          echo "<td>{$row['description']}</td>";
          echo "<td>{$row['registration_date']}</td>";
          echo "</tr>";
          $id++;
        }
      } else {
        echo "<tr><td colspan='8' class='text-center'>No cases found</td></tr>";
      }

      $conn->close();
      ?>
    </tbody>
  </table>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<!-- DataTable Init -->
<script>
  $(document).ready(function () {
    $('#caseTable').DataTable({
      pageLength: 5,
      lengthMenu: [5, 10, 25, 50]
    });
  });
</script>

</body>
</html>
