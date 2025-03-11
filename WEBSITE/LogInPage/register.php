<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate password match
    if ($password !== $confirm_password) {
        die('Passwords do not match!');
    }

    // Create a string with the user data
    $userData = "Username: $username\nEmail: $email\nPassword: $password\n\n";

    // File path to user_registration.txt
    $filePath = 'user_registration.txt';

    // Append the user data to the file
    if (file_put_contents($filePath, $userData, FILE_APPEND | LOCK_EX)) {
        echo 'Registration successful! Data saved to user_registration.txt.';
    } else {
        echo 'Error saving data!';
    }
} else {
    echo 'Invalid request!';
}
?>