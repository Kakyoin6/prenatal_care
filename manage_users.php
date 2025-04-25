<?php
// Include database connection
include('config.php');

// Fetch all users from the database
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);

// Check if the admin is logged in
session_start();
if ($_SESSION['role'] != 'admin') {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-semibold text-gray-800">Manage Users</h2>

        <!-- Add New User Button -->
        <a href="add_user.php" class="mt-4 inline-block px-6 py-2 bg-blue-500 text-white rounded-md">Add New User</a>

        <!-- User Table -->
        <div class="mt-8 overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">User ID</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Username</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Email</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Role</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                        <tr>
                            <td class="px-6 py-4"><?php echo $row['user_id']; ?></td>
                            <td class="px-6 py-4"><?php echo $row['username']; ?></td>
                            <td class="px-6 py-4"><?php echo $row['email']; ?></td>
                            <td class="px-6 py-4"><?php echo ucfirst($row['role']); ?></td>
                            <td class="px-6 py-4">
                                <a href="edit_user.php?id=<?php echo $row['user_id']; ?>" class="text-yellow-500 hover:text-yellow-700">Edit</a>
                                <a href="delete_user.php?id=<?php echo $row['user_id']; ?>" class="ml-4 text-red-500 hover:text-red-700">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
