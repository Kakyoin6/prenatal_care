<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "prenatal_care"; // make sure this matches your DB

$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
