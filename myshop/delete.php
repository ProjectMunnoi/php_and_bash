<?php
  include "db.php";
  if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "DELETE FROM clients WHERE id=$id";

    if ($conn->query($sql)) {
      header("Location: index.php?success=Record deleted successfully");
      exit();
    } else {
      header("Location: index.php?error=Error deleting record: " . $conn->error);
      exit();
    }
  }
?>