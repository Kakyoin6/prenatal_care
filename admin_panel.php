<?php if ($user_role == 'admin'): ?>
    <!-- Admin Panel -->
    <div class="mt-8 bg-gray-50 p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Admin Panel</h2>

        <!-- Manage Users -->
        <div class="mb-4">
            <h3 class="text-xl font-semibold text-gray-700">Manage Users</h3>
            <p class="text-sm text-gray-500">View, add, edit, or delete user accounts.</p>
            <a href="manage_users.php" class="text-blue-500 hover:text-blue-700">Go to Users</a>
        </div>

        <!-- Manage Appointments -->
        <div class="mb-4">
            <h3 class="text-xl font-semibold text-gray-700">Manage Appointments</h3>
            <p class="text-sm text-gray-500">View and manage patient appointments.</p>
            <a href="manage_appointments.php" class="text-blue-500 hover:text-blue-700">Go to Appointments</a>
        </div>

        <!-- Manage Lamaze Classes -->
        <div class="mb-4">
            <h3 class="text-xl font-semibold text-gray-700">Manage Lamaze Classes</h3>
            <p class="text-sm text-gray-500">View and manage Lamaze classes.</p>
            <a href="manage_lamaze_classes.php" class="text-blue-500 hover:text-blue-700">Go to Lamaze Classes</a>
        </div>

        <!-- Manage Medical Records -->
        <div class="mb-4">
            <h3 class="text-xl font-semibold text-gray-700">Manage Medical Records</h3>
            <p class="text-sm text-gray-500">View and manage patient medical records.</p>
            <a href="manage_medical_records.php" class="text-blue-500 hover:text-blue-700">Go to Medical Records</a>
        </div>

    </div>
<?php endif; ?>
