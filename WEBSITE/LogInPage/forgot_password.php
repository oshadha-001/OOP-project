<?php
// File where user data is stored
$usersFile = 'users.txt';
// File to store reset tokens
$tokensFile = 'tokens.txt';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];

  // Check if the email exists in the users.txt file
  if (file_exists($usersFile)) {
    $users = file($usersFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $emailExists = false;

    foreach ($users as $user) {
      list($storedEmail, $storedPassword) = explode('|', $user);
      if ($storedEmail === $email) {
        $emailExists = true;
        break;
      }
    }

    if ($emailExists) {
      // Generate a unique token
      $token = bin2hex(random_bytes(16));

      // Store the token in the tokens.txt file
      $tokenData = "$email|$token\n";
      file_put_contents($tokensFile, $tokenData, FILE_APPEND);

      // Send email with reset link
      $resetLink = "http://yourwebsite.com/reset_password.html?token=$token";
      $subject = "Password Reset";
      $message = "Click the link to reset your password: $resetLink";
      $headers = "From: no-reply@yourwebsite.com";

      if (mail($email, $subject, $message, $headers)) {
        echo "A password reset link has been sent to your email.";
      } else {
        echo "Failed to send email.";
      }
    } else {
      echo "Email not found.";
    }
  } else {
    echo "No users registered.";
  }
}
?>