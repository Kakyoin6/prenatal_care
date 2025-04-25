<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include('includes/db.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Appointment</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100 p-6">
    <h2 class="text-2xl font-bold mb-4">📅 Book an Appointment</h2>

    <form action="book_appointment_process.php" method="POST" class="bg-white p-4 rounded shadow-md max-w-md">
        <label class="block mb-2">Appointment Date:</label>
        <input type="date" name="appointment_date" required class="w-full p-2 border rounded mb-4">

        <label class="block mb-2">Doctor's Name:</label>
        <input type="text" name="doctor_name" required class="w-full p-2 border rounded mb-4">

        <label class="block mb-2">Reason for Visit:</label>
        <textarea name="reason" required class="w-full p-2 border rounded mb-4"></textarea>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Book Appointment</button>
    </form>
</body>
</html>
