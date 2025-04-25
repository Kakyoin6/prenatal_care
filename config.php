<?php
$host = "localhost";
$user = "admin";
$password = "admin123";
$dbname = "prenatal_care";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>