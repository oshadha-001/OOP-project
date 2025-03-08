<?php
// Path to the .txt file
$filePath = 'users.txt';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the .txt file exists
    if (file_exists($filePath)) {
        // Read the .txt file
        $users = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        // Loop through each user
        foreach ($users as $user) {
            list($storedUsername, $storedEmail, $storedPassword) = explode('|', $user);

            // Check if the username matches
            if ($storedUsername === $username) {
                // Verify the password
                if (password_verify($password, $storedPassword)) {
                    // Redirect to firstpage.html
                    header("Location: firstpage.html");
                    exit;
                } else {
                    die("Incorrect password.");
                }
            }
        }

        // If the username is not found
        die("Username not found.");
    } else {
        die("No users registered.");
    }
}
?>