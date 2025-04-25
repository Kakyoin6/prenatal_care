<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include('includes/db.php');

// Get all classes
$sql = "SELECT * FROM lamaze_classes";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lamaze Classes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100 p-6">
    <h2 class="text-2xl font-bold mb-4">👶 Lamaze Classes</h2>

    <table class="table-auto w-full bg-white shadow-md rounded">
        <thead>
            <tr>
                <th class="border px-4 py-2">Class Name</th>
                <th class="border px-4 py-2">Date</th>
                <th class="border px-4 py-2">Instructor</th>
                <th class="border px-4 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td class="border px-4 py-2"><?= htmlspecialchars($row['class_name']) ?></td>
                    <td class="border px-4 py-2"><?= htmlspecialchars($row['class_date']) ?></td>
                    <td class="border px-4 py-2"><?= htmlspecialchars($row['instructor']) ?></td>
                    <td class="border px-4 py-2">
                        <form action="register_lamaze.php" method="POST">
                            <input type="hidden" name="class_id" value="<?= $row['id'] ?>">
                            <button type="submit" class="bg-green-600 text-white px-2 py-1 rounded">Register</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
