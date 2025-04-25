<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - Prenatal Care System</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

  <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-md">
    <h2 class="text-2xl font-bold mb-6 text-center text-blue-600">Login</h2>

    <form action="login_process.php" method="POST" class="space-y-5">
      <div>
        <label for="username" class="block mb-1 text-gray-700">Username or Email</label>
        <input type="text" name="username" id="username" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Enter your username or email" required>
      </div>

      <div>
        <label for="password" class="block mb-1 text-gray-700">Password</label>
        <input type="password" name="password" id="password" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Enter your password" required>
      </div>

      <div class="text-center">
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition">Login</button>
      </div>
    </form>

    <p class="mt-4 text-center text-sm text-gray-500">
      Don't have an account? <a href="create_user.php" class="text-blue-600 hover:underline">Register here</a>
    </p>
  </div>

</body>
</html>
