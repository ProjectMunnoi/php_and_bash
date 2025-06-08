<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Display</title>
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
        include "db.php";

        $sql = "SELECT * FROM emp";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row["empno"] . "</td>";
          echo "<td>" . $row["empname"] . "</td>";
          echo "<td>" . $row["salary"] . "</td>";
          echo "</tr>";
        }
        $conn->close();
      ?>
    </tbody>
  </table> 
  <a href="home.php">Home</a>
</body>
</html>