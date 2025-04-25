<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
include('includes/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $file = $_FILES['record'];

    if ($file['error'] === 0) {
        $filename = basename($file['name']);
        $target_dir = "uploads/";
        $target_file = $target_dir . time() . "_" . $filename;

        if (move_uploaded_file($file['tmp_name'], $target_file)) {
            $sql = "INSERT INTO medical_records (user_id, file_name, file_path) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iss", $user_id, $filename, $target_file);
            $stmt->execute();
            echo "✅ File uploaded successfully!";
        } else {
            echo "❌ Failed to upload file.";
        }
    } else {
        echo "❌ File error: " . $file['error'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Medical Record</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">
    <h2 class="text-xl font-bold mb-4">📁 Upload Medical Record</h2>
    <form action="" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-md">
        <input type="file" name="record" class="mb-4"><br>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Upload</button>
    </form>
</body>
</html>
