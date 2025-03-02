<?php
// Path to the .txt file
$filePath = 'users.txt';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Validate passwords match
    if ($password !== $confirmPassword) {
        die("Passwords do not match.");
    }

    // Check if the username or email already exists
    if (file_exists($filePath)) {
        $users = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($users as $user) {
            list($storedUsername, $storedEmail) = explode('|', $user);
            if ($storedUsername === $username) {
                die("Username already exists.");
            }
            if ($storedEmail === $email) {
                die("Email already exists.");
            }
        }
    }

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the user data
    $userData = "$username|$email|$hashedPassword\n";

    // Append the user data to the .txt file
    if (file_put_contents($filePath, $userData, FILE_APPEND | LOCK_EX)) {
        echo "Registration successful! <a href='login.html'>Login here</a>";
    } else {
        echo "Error saving user data.";
    }
}
?>