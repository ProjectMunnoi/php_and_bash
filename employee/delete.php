<?php
  include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete</title>
</head>
<body>
  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Salary</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $sql = "SELECT * FROM emp";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row["empno"] . "</td>";
          echo "<td>" . $row["empname"] . "</td>";
          echo "<td>" . $row["salary"] . "</td>";
          echo "<td><a href='delete.php?no=$row[empno]'>Delete</a></td>";
          echo "</tr>";
        }
      ?>
    </tbody>
  </table> 
  <?php
    if (isset($_GET['no'])) {
      $no = $_GET['no'];
      $sql = "DELETE FROM emp WHERE empno = $no";
      if ($conn->query($sql)) {
        echo "Record deleted successfully";
      } else {
        echo "Error deleting record: " . $conn->error;
      }
      $conn->close();
      header("Location: delete.php");
      exit();
    }  
  ?>
  <a href="home.php">Home</a>
</body>
</html>