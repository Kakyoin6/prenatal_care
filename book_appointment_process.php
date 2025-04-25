<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include('includes/db.php');

$user_id = $_SESSION['user_id'];
$appointment_date = $_POST['appointment_date'];
$doctor_name = $_POST['doctor_name'];
$reason = $_POST['reason'];

$sql = "INSERT INTO appointments (user_id, appointment_date, doctor_name, reason) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isss", $user_id, $appointment_date, $doctor_name, $reason);

if ($stmt->execute()) {
    header("Location: dashboard.php");
    exit();
} else {
    echo "Error booking appointment.";
}
