<?php
require 'config.php'; // Include your database configuration

session_start(); // Start a session to manage login state

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capture the input
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Create a new database connection
    $conn = new mysqli('localhost', 'root', '', 'YSTORE');

    // Check for connection error
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Prepare the statement
    $stmt = $conn->prepare('SELECT password FROM users WHERE email = ? AND role = ?');
    $stmt->bind_param('ss', $email, $role);
    $stmt->execute();
    $stmt->bind_result($hashed_password);

    // Verify credentials
    if ($stmt->fetch()) {
        // Check if the password matches
        if (password_verify($password, $hashed_password)) {
            // Set session variables to indicate successful login
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $role;

            // Redirect based on role
            if ($role === 'admin') {
                header('Location: admin/admin.php'); // Redirect to admin page
                exit();
            } else {
                header('Location: user.php'); // Redirect to user page
                exit();
            }
        } else {
            $error_message = 'Invalid password.';
        }
    } else {
        $error_message = 'Invalid email or role.';
    }

    // Clean up
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <video autoplay muted loop>
        <source src="images/signup.mp4" type="video/mp4"> <!-- Replace with your video file -->
        Your browser does not support the video tag.
    </video>

    <div id="auth" class="flex justify-center items-center min-h-screen">
        <!-- Login Form -->
        <div class="form-container">
            <div class="form-header">Login</div>
            <form action="" method="POST" class="flex flex-col gap-4">
            <label for="role" class="sr-only">Role</label>
            <select name="role" id="role" class="p-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500" required>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            
            <label for="email" class="sr-only">Email</label>
            <input type="email" name="email" id="email" placeholder="Email" class="p-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500" required>
            
            <label for="password" class="sr-only">Password</label>
            <input type="password" name="password" id="password" placeholder="Password" class="p-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500" required>
            
            <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600">Login</button>
            <?php if (isset($error_message)): ?>
                <p style="color: red;"><?= htmlspecialchars($error_message) ?></p>
            <?php endif; ?>
            <p class="text-center text-sm mt-4">Don't have an account? <a href="Signup.php" class="text-green-500 font-bold">Signup</a></p>
            </form>
        </div>
    </div>
</body>
</html>