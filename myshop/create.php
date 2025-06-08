<?php
  $name = "";
  $email = "";
  $phone = "";
  $address = "";

  $error = "";
  $success = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "db.php";

    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    do {
      if (empty($name) || empty($email) || empty($phone) || empty($address)) {
        $error = "All fields are required.";
        break;
      }

      $sql = "INSERT INTO clients (name, email, phone, address) VALUES (?, ?, ?, ?)";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("ssss", $name, $email, $phone, $address);

      if ($stmt->execute()) {
        $success = "New client created successfully.";
      } else {
        $error = "Error: " . $stmt->error;
      }

      $stmt->close();
    } while (false);
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

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>