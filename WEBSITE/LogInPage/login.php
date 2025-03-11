<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Read user data from text file
    $users = file('users.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($users as $user) {
        list($stored_username, $stored_email, $stored_password) = explode(',', $user);

        if ($username === $stored_username && password_verify($password, $stored_password)) {
            echo "Login successful!";
            exit;
        }
    }

    echo "Invalid username or password.";
}
?>