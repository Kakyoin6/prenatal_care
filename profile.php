<?php
session_start();
include('includes/db.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$query = $conn->query("SELECT username, email, bio, profile_picture FROM users WHERE id = $user_id");
$user = $query->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">👤 My Profile</h2>

        <div class="flex items-center space-x-4 mb-6">
            <img src="<?= $user['profile_picture'] ? 'uploads/' . $user['profile_picture'] : 'default.png' ?>" alt="Profile" class="w-24 h-24 rounded-full object-cover">
            <div>
                <p><strong>Username:</strong> <?= htmlspecialchars($user['username']) ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
            </div>
        </div>

        <form action="update_profile.php" method="POST" enctype="multipart/form-data" class="space-y-4">
            <div>
                <label class="block font-medium">Bio:</label>
                <textarea name="bio" rows="4" class="w-full border rounded p-2"><?= htmlspecialchars($user['bio']) ?></textarea>
            </div>

            <div>
                <label class="block font-medium">Change Profile Picture:</label>
                <input type="file" name="profile_picture" accept="image/*" class="border p-2 rounded">
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update Profile</button>
        </form>
    </div>
</body>
</html>
