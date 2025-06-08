<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  <title>My Shop</title>
</head>
<body>
   <div class="container my-5">
    <h2>List of clients</h2>
    <a role="button" href="create.php" class="btn btn-primary">New client</a>

    <table class="table table-hover">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Address</th>
          <th>Created at</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
          include "db.php";

          $sql = "SELECT * FROM clients";
          $result = $conn->query($sql);

          if (!$result)
            die("Query failed: " . $conn->error);

          while ($row = $result->fetch_assoc()) {
            echo "
              <tr>
                <td>$row[id]</td>
                <td>$row[name]</td>
                <td>$row[email]</td>
                <td>$row[phone]</td>
                <td>$row[address]</td>
                <td>$row[created_at]</td>
                <td>
                  <a href='edit.php?id=$row[id]' class='btn btn-warning'>Edit</a>
                  <a href='delete.php?id=$row[id]' class='btn btn-danger'>Delete</a>
              </tr>
            ";
          }
        ?>
      </tbody>
    </table>
   </div>
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>