<?php
session_start();
include('includes/db.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$result = $conn->query("SELECT id, username, email, profile_pic, bio, is_admin FROM users WHERE id = $user_id");
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Prenatal Care</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <div class="max-w-5xl mx-auto mt-10 px-4">
        <div class="bg-white p-6 rounded-lg shadow flex items-center space-x-4">
            <img src="uploads/<?= htmlspecialchars($user['profile_pic']) ?>" class="w-20 h-20 rounded-full object-cover" alt="Profile Picture">
            <div>
                <h2 class="text-xl font-bold text-gray-800">👋 Welcome, <?= htmlspecialchars($user['username']) ?></h2>
                <p class="text-gray-600"><?= htmlspecialchars($user['bio']) ?></p>
            </div>
        </div>

        <!-- 🔔 Step 1: Upcoming Appointments Notification -->
        <?php
        $soon = $conn->query("
            SELECT appointment_date 
            FROM appointments 
            WHERE user_id = {$user['id']} 
            AND appointment_date >= CURDATE() 
            AND appointment_date <= DATE_ADD(CURDATE(), INTERVAL 3 DAY) 
            LIMIT 1
        ");
        ?>
        <?php if ($soon->num_rows > 0): ?>
            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 my-4 rounded">
                <p>⚠️ You have an appointment within the next 3 days! Please check your schedule.</p>
            </div>
        <?php endif; ?>

        <!-- 🔗 Dashboard Links -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
            <a href="book_appointment.php" class="bg-indigo-600 text-white p-4 rounded-xl shadow text-center font-semibold hover:bg-indigo-700">📅 Book Appointment</a>
            <a href="lamaze_classes.php" class="bg-pink-500 text-white p-4 rounded-xl shadow text-center font-semibold hover:bg-pink-600">🤰 View Lamaze Classes</a>
            <a href="upload_record.php" class="bg-green-600 text-white p-4 rounded-xl shadow text-center font-semibold hover:bg-green-700">📁 Upload Medical Record</a>
            <a href="view_records.php" class="bg-yellow-500 text-white p-4 rounded-xl shadow text-center font-semibold hover:bg-yellow-600">📂 View Medical Records</a>
            <a href="profile.php" class="bg-blue-500 text-white p-4 rounded-xl shadow text-center font-semibold hover:bg-blue-600">👤 View Profile</a>
            <a href="logout.php" class="bg-red-600 text-white p-4 rounded-xl shadow text-center font-semibold hover:bg-red-700">🚪 Logout</a>
        </div>

        <!-- 🕒 Step 2: Recent Activities -->
        <div class="mt-10 bg-white p-6 rounded-lg shadow">
            <h2 class="text-lg font-bold mb-2 text-indigo-600">🕒 Recent Activities</h2>

            <?php
            $recent_appointments = $conn->query("
                SELECT appointment_type, appointment_date 
                FROM appointments 
                WHERE user_id = {$user['id']} 
                ORDER BY appointment_date DESC 
                LIMIT 5
            ");

            $recent_uploads = $conn->query("
                SELECT file_name, upload_date 
                FROM medical_records 
                WHERE user_id = {$user['id']} 
                ORDER BY upload_date DESC 
                LIMIT 5
            ");
            ?>

            <h3 class="font-semibold mt-4">📅 Appointments</h3>
            <ul class="list-disc list-inside text-sm">
                <?php while ($a = $recent_appointments->fetch_assoc()): ?>
                    <li><?= htmlspecialchars($a['appointment_type']) ?> on <?= htmlspecialchars($a['appointment_date']) ?></li>
                <?php endwhile; ?>
            </ul>

            <h3 class="font-semibold mt-4">📁 Uploaded Records</h3>
            <ul class="list-disc list-inside text-sm">
                <?php while ($r = $recent_uploads->fetch_assoc()): ?>
                    <li><?= htmlspecialchars($r['file_name']) ?> (<?= htmlspecialchars($r['upload_date']) ?>)</li>
                <?php endwhile; ?>
            </ul>
        </div>

        <!-- 👑 Step 3: Admin Section -->
        <?php if ($user['is_admin']): ?>
        <div class="mt-10 bg-white p-6 rounded-lg shadow">
            <h2 class="text-lg font-bold mb-2 text-purple-600">👑 Admin Panel: All Users</h2>
            <?php
            $users = $conn->query("SELECT id, username, email, is_admin FROM users ORDER BY id DESC");
            ?>
            <table class="w-full text-sm text-left text-gray-700 mt-4">
                <thead class="bg-gray-100 text-xs uppercase text-gray-600">
                    <tr>
                        <th class="px-4 py-2">Username</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Role</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($u = $users->fetch_assoc()): ?>
                        <tr class="border-b">
                            <td class="px-4 py-2"><?= htmlspecialchars($u['username']) ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($u['email']) ?></td>
                            <td class="px-4 py-2"><?= $u['is_admin'] ? 'Admin' : 'User' ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>
