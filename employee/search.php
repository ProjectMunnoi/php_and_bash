<?php include "db.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search</title>
</head>
<body>
  <form method="post">
    <label for="empno">Enter Employee Number:</label>
    <input type="text" id="empno" name="empno" required>
    <button type="submit">Search</button>
  </form>
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
        if (isset($_POST["empno"])) {
          $no = $_POST["empno"];
          $sql = "SELECT * FROM emp WHERE empno=$no";
          $result = $conn->query($sql);
          
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . $row["empno"] . "</td>";
              echo "<td>" . $row["empname"] . "</td>";
              echo "<td>" . $row["salary"] . "</td>";
              echo "</tr>";
            }
          } else {
            echo "<tr><td colspan='3'>No records found</td></tr>";
          }
          $conn->close();
        }
      ?>
    </tbody>
  </table>
  <a href="home.php">Home</a>
</body>
</html>