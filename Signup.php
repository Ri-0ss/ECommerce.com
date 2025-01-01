<?php
require 'config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        die('Passwords do not match.');
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $conn = new mysqli('localhost', 'root', '', 'YSTORE');

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    $stmt = $conn->prepare('INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, "user")');
    $stmt->bind_param('sss', $name, $email, $hashed_password);

    if ($stmt->execute()) {
        header('Location: index.php');
    } else {
        if ($stmt->errno === 1062) {
            echo 'Error: Email already exists.';
        } else {
            echo 'Error: ' . $stmt->error;
        }
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <video autoplay muted loop>
        <source src="images/login.mp4" type="video/mp4"> <!-- Replace with your video file -->
        Your browser does not support the video tag.
    </video>

    <div id="auth" class="flex justify-center items-center min-h-screen">
        <!-- Signup Form -->
        <div class="form-container">
            <div class="form-header">Signup</div>
            <form action="signup.php" method="POST" class="flex flex-col gap-4">
                <label for="name" class="sr-only">Full Name</label>
                <input type="text" name="name" id="name" placeholder="Full Name" class="p-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500 " required>
                
                <label for="signup-email" class="sr-only">Email</label>
                <input type="email" name="email" id="signup-email" placeholder="Email" class="p-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500" required>
                
                <label for="signup-password" class="sr-only">Password</label>
                <input type="password" name="password" id="signup-password" placeholder="Password" class="p-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500" required>
                
                <label for="confirm-password" class="sr-only">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm-password" placeholder="Confirm Password" class="p-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500" required>
                
                <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600">Signup</button>
                <p class="text-center text-sm mt-4">Already have an account? <a href="index.php" class="text-green-500 font-bold">Login</a></p>
            </form>
        </div>
    </div>
</body>
</html>