<?php
// File where user data is stored
$usersFile = 'users.txt';
// File where reset tokens are stored
$tokensFile = 'tokens.txt';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $token = $_POST['token'];
  $newPassword = $_POST['new_password'];
  $confirmPassword = $_POST['confirm_password'];

  if ($newPassword === $confirmPassword) {
    // Read tokens file
    if (file_exists($tokensFile)) {
      $tokens = file($tokensFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

      foreach ($tokens as $line) {
        list($storedEmail, $storedToken) = explode('|', $line);
        if ($storedToken === $token) {
          // Token is valid, update the password
          $users = file($usersFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
          $updatedUsers = [];

          foreach ($users as $user) {
            list($email, $password) = explode('|', $user);
            if ($email === $storedEmail) {
              // Update the password
              $updatedUsers[] = "$email|$newPassword";
            } else {
              $updatedUsers[] = $user;
            }
          }

          // Save updated users back to the file
          file_put_contents($usersFile, implode("\n", $updatedUsers));

          // Remove the used token
          $updatedTokens = array_diff($tokens, ["$storedEmail|$storedToken"]);
          file_put_contents($tokensFile, implode("\n", $updatedTokens));

          echo "Password reset successfully.";
          exit;
        }
      }
    }

    echo "Invalid or expired token.";
  } else {
    echo "Passwords do not match.";
  }
}
?>