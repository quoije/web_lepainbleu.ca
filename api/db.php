<?php

$servername = "database";
$username = "admin";
$password = "l[k8]ww(/mwHfO.*";
$dbname = "web";

$conn = new mysqli($servername,$username,$password,$dbname);

// Check connection
if ($conn -> connect_errno) {
  echo "La connection à rip: " . $conn -> connect_error;
  exit();
}

?>
