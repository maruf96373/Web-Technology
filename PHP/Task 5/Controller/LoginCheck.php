<?php
session_start(); 
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

if (!isset($_SESSION['users'])) {
  echo "No users registered yet.";
  exit; 
}
$authenticated = false;
foreach ($_SESSION['users'] as $user) {
  if ($user["username"] === $username && password_verify($password, $user["password"])) {
    $authenticated = true;
    $_SESSION['logged_in'] = true; 
    break;
  }
}
if ($authenticated) {
  echo "Login successful.";
  header('location: home.php');
} else {
  echo "Invalid username or password.";
}

?>
