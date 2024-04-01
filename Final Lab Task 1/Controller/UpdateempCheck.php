<?php
require_once('../Model/empdb.php');
$name = $_REQUEST['name'];
$contact = $_REQUEST['contact'];
$user = $_REQUEST['uname'];
$password = $_REQUEST['password'];

function namecheck($name){
    if ($name == "") {
        echo "Name cannot be empty";
    } else {
        $words = explode(" ", $name);
    
        function hasAtLeastTwoWords($words) {
            return (count($words) >= 2);
        }
    
        function startLetter($words) {
            foreach ($words as $word) {
                if (!ctype_alpha($word[0])) {
                    return false;
                }
            }
            return true;
        }
    
        function validChar($words) {
            foreach ($words as $word) {
                for ($i = 0; $i < strlen($word); $i++) {
                    $char = $word[$i];
                    if (!ctype_alpha($char) && $char !== '.' && $char !== '-') {
                        return false;
                    }
                }
            }
            return true;
        }
    
        if (!hasAtLeastTwoWords($words)) {
            echo "Name must contain at least two words";
        } elseif (!startLetter($words)) {
            echo "All words must start with a letter.";
        } elseif (!validChar($words)) {
            echo "Input can only contain letters (a-z, A-Z), periods (.), and dashes (-).";
        } else {
        return true;
        }
    }
    }
    function CheckContact($contact) {
        if ($contact == "") {
            echo "user cannot be empty";
        } 
   else{
        if (strlen($contact) !== 14) {
            echo "Contact must be 14 digits long";
            return false;
        }
        
        
        if (!in_array(substr($contact, 0, 6), array("+88017", "+88019", "+88018", "+88015", "+88016", "+88013"))) {
            echo "Contact must start with +88017, +88019, +88018, +88015, +88016, or +88013";
            return false;
        }  
        return true;
       }    }
    
    
    function user($user) {
        if ($user == "") {
            echo "user cannot be empty";
        } else {
            $verify = uniemp($user);
            if ($verify) {
                echo "This user is already taken. Please choose a different user";
            }
      
            if (strlen($user) < 5) {
                echo "user must be at least 5 characters long";
            }
      
            $validChars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_";
            $hasvalidChar = true;
      
            for ($i = 0; $i < strlen($user); $i++) {
                $char = $user[$i];
                if (strpos($validChars, $char) === false) {
                    $hasvalidChar = false;
                    echo "user can only contain letters, numbers, and underscores";
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

  if(namecheck($name)&&CheckContact($contact)&&user($user)&&passcheck($password)){
  $emp = ['name'=>$name,'contact'=>$contact ,'password'=>$password];
  $status = upemp($emp,$user);
  if($status){
      header('location: ../View/emp.php');
  }
else{
  echo"db Connection error";
}}
?>