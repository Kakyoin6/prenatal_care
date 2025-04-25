<?php
include('includes/db.php');

// Example admin user (you can change details as needed)
$username = 'admin';
$password = password_hash('admin123', PASSWORD_DEFAULT); // Secure hash
$email = 'admin@example.com';
$role = 'admin';

$sql = "INSERT INTO users (username, password, email, role) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $username, $password, $email, $role);

if ($stmt->execute()) {
    echo "Admin user created successfully.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
