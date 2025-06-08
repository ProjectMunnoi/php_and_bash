<?php
  $server = "localhost";
  $user = "root";
  $password = "";
  $database = "Employee";

  $conn = new mysqli($server, $user, $password, $database);
  if ($conn->connect_error)
    die("Connection failed: " . $conn->connect_error);
  echo "Connected successfully to the database: $database<br>";
?>