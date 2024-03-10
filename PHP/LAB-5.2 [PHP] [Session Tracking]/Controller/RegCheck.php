<?php

session_start(); // Start session if needed

$name = $_REQUEST['name'];
$username = $_REQUEST['username'];
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
$gender = $_REQUEST['gender'];
$dd = $_REQUEST['dd'];
$mm = $_REQUEST['mm'];
$yyyy = $_REQUEST['yyyy'];

// 1. Sanitize and Validate User Data (replace with your validation logic)
$name = htmlspecialchars(strip_tags($name));
$username = htmlspecialchars(strip_tags($username));
$email = filter_var($email, FILTER_SANITIZE_EMAIL);  // Basic email sanitization

// Additional validation for username uniqueness, password strength, etc.

// 2. Check for Duplicate Username (optional - server-side validation)
if (isset($_SESSION['users']) && in_array($username, array_column($_SESSION['users'], 'username'))) {
  echo "Username already exists. Please choose a different one.";
  exit; // Stop script execution
}

// 3. Hash Password for Security
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// 4. Create User Data Array
$user_data = array(
    "name" => $name,
    "username" => $username,
    "email" => $email,
    "password" => $password_hash,
    "gender" => $gender,
    "dob" => $yyyy . '-' . $mm . '-' . $dd,
);

// 5. Store User Data in Session Array
if (!isset($_SESSION['users'])) {
  $_SESSION['users'] = array();
}
array_push($_SESSION['users'], $user_data);

// 6. Success Message (optional)
echo "User created successfully! Please login.";

// 7. Redirect to Login Page (optional)
// header('location: ../view/login.php');

?>
