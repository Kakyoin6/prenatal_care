<?php
session_start();
include('includes/db.php'); // Make sure this file path is correct

// Fetch records from the database
$sql = "SELECT * FROM medical_records ORDER BY uploaded_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Medical Records</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">📄 Uploaded Medical Records</h2>

        <?php if ($result->num_rows > 0): ?>
            <table class="table-auto w-full">
                <thead>
                    <tr class="bg-gray-200 text-left">
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">File Name</th>
                        <th class="px-4 py-2">Uploaded At</th>
                        <th class="px-4 py-2">View</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr class="border-b">
                            <td class="px-4 py-2"><?php echo $row['id']; ?></td>
                            <td class="px-4 py-2"><?php echo htmlspecialchars($row['file_name']); ?></td>
                            <td class="px-4 py-2"><?php echo $row['uploaded_at']; ?></td>
                            <td class="px-4 py-2">
                                <a href="uploads/<?php echo urlencode($row['file_name']); ?>" target="_blank" class="text-blue-500 underline">Open</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No records found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
