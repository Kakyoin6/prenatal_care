<?php
session_start();
include('includes/db.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$bio = $_POST['bio'];
$filename = null;

if (!empty($_FILES['profile_picture']['name'])) {
    $filename = time() . '_' . basename($_FILES['profile_picture']['name']);
    $target = "uploads/" . $filename;
    move_uploaded_file($_FILES['profile_picture']['tmp_name'], $target);

    $conn->query("UPDATE users SET bio=?, profile_picture=? WHERE id=?")->bind_param("ssi", $bio, $filename, $user_id);
    $stmt = $conn->prepare("UPDATE users SET bio = ?, profile_picture = ? WHERE id = ?");
    $stmt->bind_param("ssi", $bio, $filename, $user_id);
} else {
    $stmt = $conn->prepare("UPDATE users SET bio = ? WHERE id = ?");
    $stmt->bind_param("si", $bio, $user_id);
}

if ($stmt->execute()) {
    header("Location: profile.php");
} else {
    echo "Error updating profile.";
}
?>
