<?php
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "", "login_system");

if ($conn->connect_error) {
    die("Database connection failed.");
}

// Get form data
$user = $_POST['username'] ?? '';
$pass = $_POST['password'] ?? '';

// Prepare and execute SQL query
$stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
$stmt->bind_param("s", $user);
$stmt->execute();
$result = $stmt->get_result();

// Check user existence and verify password
if ($row = $result->fetch_assoc()) {
    if ($pass === $row['password']) { // use password_verify() if passwords are hashed
        $_SESSION['username'] = $user;
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Incorrect password.";
    }
} else {
    echo "Username not found.";
}

$stmt->close();
$conn->close();
