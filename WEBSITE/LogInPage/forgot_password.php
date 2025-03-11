<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    // Read user data from text file
    $users = file('users.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($users as $user) {
        list($stored_username, $stored_email, $stored_password) = explode(',', $user);

        if ($email === $stored_email) {
            // Generate a reset token (for simplicity, use a random string)
            $token = bin2hex(random_bytes(16));

            // Save the token to a file (or database in a real application)
            file_put_contents('tokens.txt', "$email,$token\n", FILE_APPEND);

            // Send the reset link to the user's email (simulated here)
            $reset_link = "http://yoursite.com/reset_password.html?token=$token";
            echo "Reset link sent to your email: $reset_link";
            exit;
        }
    }

    echo "Email not found.";
}
?>