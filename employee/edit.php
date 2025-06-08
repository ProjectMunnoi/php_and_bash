<?php
  include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit</title>
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
          echo "<td><a href='edit.php?no=$row[empno]'>Edit</a></td>";
          echo "</tr>";
        }
      ?>
    </tbody>
  </table> 
  <?php if (isset($_GET['no'])): ?>
    <?php
      $no = $_GET['no'];
      $sql = "SELECT * FROM emp WHERE empno = $no";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
    ?>
    <form method="post">
      No: <input type="text" name="no" value="<?php echo $row['empno']; ?>"><br>
      Name: <input type="text" name="name" value="<?php echo $row['empname']; ?>"><br>
      Salary: <input type="text" name="salary" value="<?php echo $row['salary']; ?>"><br>
      <input type="submit" name="submit" value="Update">
    </form>
  <?php endif; ?>
  <?php
    if (isset($_GET['no']) && $_POST) {
      $no = $_GET['no'];
      $new_no = $_POST["no"];
      $name = $_POST["name"];
      $salary = $_POST["salary"];

      if ($_POST) {
        $sql = "UPDATE emp SET empno = $new_no, empname = '$name', salary = $salary WHERE empno = $no";
        if ($conn->query($sql)) {
          echo "Record updated successfully";
        } else {
          echo "Error updating record: " . $conn->error;
        }
        $conn->close();
        header("Location: edit.php");
        exit();
      }
    }
    ?> 
  <a href="home.php">Home</a>
</body>
</html>