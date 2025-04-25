<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include('includes/db.php');

$user_id = $_SESSION['user_id'];
$class_id = $_POST['class_id'];

// Save registration
$sql = "INSERT INTO lamaze_registrations (user_id, class_id) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $user_id, $class_id);

if ($stmt->execute()) {
    header("Location: lamaze_classes.php");
    exit();
} else {
    echo "Error registering for class.";
}
