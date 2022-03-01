<?php

$servername = "127.0.0.1";
$username = "admin";
$password = "Lepainbleu123!";
$dbname = "web";

$conn = new mysqli($servername,$username ,$password,$dbname);

// Check connection
if ($conn -> connect_errno) {
  echo "La connection à rip: " . $conn -> connect_error;
  exit();
}

?>
