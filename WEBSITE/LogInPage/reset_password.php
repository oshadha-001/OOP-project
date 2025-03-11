<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['token'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate passwords match
    if ($new_password !== $confirm_password) {
        die("Passwords do not match.");
    }

    // Read tokens from text file
    $tokens = file('tokens.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($tokens as $token_entry) {
        list($stored_email, $stored_token) = explode(',', $token_entry);

        if ($token === $stored_token) {
            // Update the user's password in the users.txt file
            $users = file('users.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            foreach ($users as $index => $user) {
                list($stored_username, $stored_email, $stored_password) = explode(',', $user);

                if ($stored_email === $email) {
                    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                    $users[$index] = "$stored_username,$stored_email,$hashed_password";
                    file_put_contents('users.txt', implode("\n", $users));
                    echo "Password reset successful!";
                    exit;
                }
            }
        }
    }

    echo "Invalid or expired token.";
}
?>