<?php
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Admin registration check (optional step)
    $name = $_POST['name'];
    // If the email is "admin", set it as 'admin'
    $email = ($_POST['email'] == 'admin') ? 'admin' : $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $password);
    
    if ($stmt->execute()) {
        echo "Registration successful! <a href='login.php' class='text-blue-500 hover:underline'>Login here</a>";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!-- Registration Form with Modern Look and Inviting Background -->
<div class="min-h-screen bg-cover bg-center" style="background-image: url('mother_child.jpg');">
    <div class="flex justify-center items-center min-h-screen bg-opacity-50 bg-gradient-to-r from-yellow-400 to-pink-600">
        <div class="bg-white p-8 rounded-3xl shadow-2xl max-w-lg w-full">
            <h2 class="text-4xl font-extrabold text-center text-purple-700 mb-6">Create Your Prenatal Account</h2>
            <p class="text-lg text-center text-gray-700 mb-6">Join our Prenatal Care community for the best support and guidance!</p>
            <form method="POST">
                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-gray-800">Full Name</label>
                    <input type="text" name="name" id="name" placeholder="Your Full Name" required class="w-full p-4 mt-2 border rounded-2xl focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                </div>

                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-800">Email</label>
                    <input type="text" name="email" id="email" placeholder="Your Email" required class="w-full p-4 mt-2 border rounded-2xl focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-800">Password</label>
                    <input type="password" name="password" id="password" placeholder="Your Password" required class="w-full p-4 mt-2 border rounded-2xl focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                </div>

                <div class="mb-6 text-center">
                    <button type="submit" class="w-full bg-gradient-to-r from-pink-500 to-yellow-500 text-white p-4 rounded-2xl font-semibold text-lg hover:bg-gradient-to-r hover:from-pink-600 hover:to-yellow-600 focus:outline-none focus:ring-4 focus:ring-pink-500">Register</button>
                </div>

                <p class="text-center text-sm text-gray-700">Already have an account? <a href="login.php" class="text-purple-600 hover:underline">Login here</a></p>
            </form>
        </div>
    </div>
</div>
