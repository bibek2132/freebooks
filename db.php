<?php
$host = "localhost";
$user = "root"; // Default user in XAMPP
$password = ""; // Default password in XAMPP
$database = "freebooks";

$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
