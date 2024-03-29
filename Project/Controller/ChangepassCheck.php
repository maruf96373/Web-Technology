<?php
require_once('../Model/guestdb.php');
session_start();
$user = $_SESSION['username'];
$cpassword = $_REQUEST['cpassword'];
$npassword = $_REQUEST['npassword'];
$rpassword = $_REQUEST['rpassword'];

function passcheck($user, $npassword, $cpassword, $rpassword) {
    if ($npassword == "" || $cpassword == "" || $rpassword == "") {
        echo "Password field is empty";
        return false; 
    } else {
        $Spass = spass($user);
        if (!$Spass) {
            echo "User not found";
            return false;
        }
        $passw = $Spass[0]['password'];
        if ($cpassword != $passw) {
            echo "Your given password doesn't match with your current password <br>";
            return false;
        } elseif ($npassword != $rpassword) {
            echo "Password doesn't match with your new password <br>";
            return false;
        } elseif (strlen($npassword) < 8) {
            echo "Password must be at least 8 characters long <br>";
            return false; 
        } else {
            $validChars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_@#*";
            for ($i = 0; $i < strlen($npassword); $i++) {
                $char = $npassword[$i];
                if (strpos($validChars, $char) === false) {
                    echo "Password can only contain letters, numbers, and underscores";
                    return false; 
                }
            }
            return true;
        }
    }
}

if (passcheck($user, $npassword, $cpassword, $rpassword)) {
    $pass = upPass($user, $npassword);
    if ($pass) {
        echo "Password updated successfully";
    } else {
        echo "DB error! Please try again";
    }
}
?>
