<?php
session_start();
require_once('../Model/guestdb.php');
require_once('../Model/Staffdb.php');

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

function username($username) {
    if ($username == "") {
        echo "Username cannot be empty";
    } else {
        $verify = uniuser($username);
        if ($verify) {
            echo "This username is already taken. Please choose a different username";
        }
  
        if (strlen($username) <5) {
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
  function passcheck($password){
    if($password==""){
        echo"password field is empty";
    }else{
        if (strlen($password) < 8) {
            echo"password must be at least 8 characters long";
          }
     
          $validChars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_@#*";
          $hasvalidChar = true;
    
          for ($i = 0; $i < strlen($password); $i++) {
              $char = $password[$i];
              if (strpos($validChars, $char) === false) {
                  $hasvalidChar = false;
                  echo "password can only contain letters, numbers, and underscores";
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
    if(username($username) && passcheck($password)) {
        if($username === "admin" && $password === "admin") {
            $_SESSION['username'] = $username; 
            setcookie('flag', 'true', time()+3000, '/');
            header('location: ../View/AdminHome.php');
            exit(); 
        } else {
            $username_first_letter = strtoupper(substr($username, 0, 1));
            if($username_first_letter === "S") {
                $status = Slogin($username, $password);
            } else {
                $status = login($username, $password); 
            }
    
            if($status) {
                $_SESSION['username'] = $username; 
                setcookie('flag', 'true', time()+3000, '/');
                if($username_first_letter === "S") {
                    header('location: ../View/StaffHome.php');
                } else {
                    header('location: ../View/home.php');
                }
                exit(); 
            } else {
                echo "Invalid credentials!";
            }
        }
    } else {
        echo "Invalid input!";
    }
    
?>
