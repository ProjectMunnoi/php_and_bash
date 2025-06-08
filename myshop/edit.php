<?php
  include "db.php";
  
  $id = "";
  $name = "";
  $email = "";
  $phone = "";
  $address = "";

  $error = "";
  $success = "";

  if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (!isset($_GET["id"])) {
      header("Location: index.php");
      exit();
    }

    $id = $_GET["id"];

    $sql = "SELECT * FROM clients WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
      header("Location: index.php");
      exit();
    }

    $name = $row["name"];
    $email = $row["email"];
    $phone = $row["phone"];
    $address = $row["address"];

  } else {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    do {
      if (empty($id) || empty($name) || empty($email) || empty($phone) || empty($address)) {
        $error = "All fields are required.";
        break;
      }

      $sql = "UPDATE clients SET name='$name', email='$email', phone='$phone', address='$address' WHERE id=$id";
      $result = $conn->query($sql);

      if (!$result) {
        $error = "Error updating record: " . $conn->error;
        break;
      } else {
        $success = "Record updated successfully.";
        header("Location: index.php");
        exit();
      }
    } while (true);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  <title>Create page</title>
</head>
<body>
   <div class="container my-5">
    <h2>New client</h2>
    <?php
      if (!empty($error)) {
        echo "<div class='alert alert-danger alert-dismissible' role='alert'>$error <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
      }
      if (!empty($success)) {
        echo "<div class='alert alert-success alert-dismissible' role='alert'>$success <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
      }
    ?>
    <form action="#" method="post">
      <input type="hidden" value="<?php echo $id; ?>" name="id">
      <div class="row mb-3">
        <label class="col-auto col-form-label fs-5">Name</label>
        <div class="col-6">
          <input value="<?php echo $name; ?>" type="text" class="form-control" name="name">
        </div>
      </div>
      <div class="row mb-3">
        <label class="col-auto col-form-label fs-5">Email</label>
        <div class="col-6">
          <input value="<?php echo $email ?>" type="text" class="form-control" name="email">
        </div>
      </div>
      <div class="row mb-3">
        <label class="col-auto col-form-label fs-5">Phone</label>
        <div class="col-6">
          <input value="<?php echo $phone; ?>" type="text" class="form-control" name="phone">
        </div>
      </div>
      <div class="row mb-3">
        <label class="col-auto col-form-label fs-5">Address</label>
        <div class="col-6">
          <input value="<?php echo $address; ?>" type="text" class="form-control" name="address">
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-sm-3 d-grid">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="col-sm-3 d-grid">
          <a role="button" href="index.php" class="btn btn-secondary">Cancel</a>
        </div>
      </div>
      <a href="index.php" role="button" class="btn btn-secondary">Back</a>
    </form>
   </div>
</body>
</html>