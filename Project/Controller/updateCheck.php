<?php
require_once('../Model/guestdb.php');
if (isset($_POST['gid'])) {
    $gid = $_POST['gid']; 
    $taken = uniId($gid);
  if ($taken) {
      echo "This ID is already taken. Please choose a different ID";
      return false;
  }
}else {
  echo "Invalid request";
  exit;
}
$gid=isset($_REQUEST['gid']) ? $_REQUEST['gid'] : '';
$username=isset($_REQUEST['username']) ? $_REQUEST['username'] : '';
function username($username) {
    if ($username == "") {
        echo "Username cannot be empty";
    } else {
        if (strlen($username) < 5) {
            echo "Username must be at least 5 characters long";
        }
  
        $validChars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_";
        $hasvalidChar = true;
  
        for ($i = 0; $i < strlen($username); $i++) {
            $char = $username[$i];
            if (strpos($validChars, $char) === false) {
                $hasvalidChar = false;
                echo "Username can only contain letters, numbers, and underscores";
                break;
            }
        }
  
        if ($hasvalidChar) {
          return true;
        } else {
          return false;
        }
    }
  }

  function IdCheck($gid) {
    if (empty($gid)) {
        return "Guest ID cannot be empty";
    }


    if (substr($gid, 0, 1) !== 'G') {
        echo "Invalid Guest ID format. It must start with 'G'";
        return false;
    }


    if (strlen($gid) !== 6) {
        echo "Invalid Guest ID format. It must be 6 characters long";
        return false;
    }
    $numericPart = substr($gid, 1);
    if (!ctype_digit($numericPart)) {
        echo "Invalid Guest ID format. After the 'G' prefix, it must contain only digits";
        return false;
    }
    return true;
}
if(username($username)&&IdCheck($gid)){
     $status = UpdateId($username, $gid);
    if($status){
        header('location: ../View/GuestAdmin.php');
    }}else{
        echo "DB error! Please try again";
    }



?>