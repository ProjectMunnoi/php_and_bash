<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Insert</title>
</head>
<body>
  <form method="post">
    No: <input type="text" name="no"><br>
    Name: <input type="text" name="name"><br>
    Salary: <input type="text" name="salary">
    <input type="submit" name="submit" value="Insert">
  </form> 
  <?php
    include 'db.php';
    if ($_POST) {
      $no = $_POST["no"];
      $name = $_POST["name"];
      $salary = $_POST["salary"];

      $sql = "INSERT INTO emp(empno, empname, salary) VALUES ($no, '$name', $salary)";
      if ($conn->query($sql))
        echo "Record inserted successfully";
      else
        echo "Error inserting record: " . $conn->error;
      $conn->close();
    }
  ?>
  <a href="home.php">Home</a>
</body>
</html>