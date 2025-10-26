<?php
$host = "your_host_here";
$user = "your_username_here";
$pass = "your_password_here";
$dbname = "your_db_name_here";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
  die("Database connection failed: " . $conn->connect_error);
}
?>
