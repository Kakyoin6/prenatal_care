<?php
session_start();
include('includes/db.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usernameOrEmail = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Prepare query to match either username or email
    $stmt = $conn->prepare("SELECT id, username, email, password, is_admin FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $usernameOrEmail, $usernameOrEmail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($user = $result->fetch_assoc()) {
        if (password_verify($password, $user['password'])) {
            // Success: set session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['is_admin'] = $user['is_admin'];

            header("Location: dashboard.php");
            exit();
        } else {
            $error = "❌ Incorrect password.";
        }
    } else {
        $error = "❌ User not found.";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Error</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

  <div class="bg-white p-6 rounded shadow-md text-center">
    <h2 class="text-xl font-bold mb-4 text-red-600">Login Failed</h2>
    <p class="text-gray-600 mb-4"><?= isset($error) ? $error : "Something went wrong." ?></p>
    <a href="login.php" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Try Again</a>
  </div>

</body>
</html>
