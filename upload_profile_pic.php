<?php
session_start();
include('includes/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["profile_pic"])) {
    $targetDir = "uploads/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir);
    }

    $filename = time() . "_" . basename($_FILES["profile_pic"]["name"]);
    $targetFilePath = $targetDir . $filename;

    if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $targetFilePath)) {
        $stmt = $conn->prepare("UPDATE users SET profile_pic = ? WHERE id = ?");
        $stmt->bind_param("si", $filename, $_SESSION['user_id']);
        $stmt->execute();
        header("Location: dashboard.php");
        exit;
    } else {
        echo "❌ Failed to upload image.";
    }
}
?>
