<?php

require_once('../Model/guestdb.php');
$name = $_REQUEST['name'];
$username = $_REQUEST['username'];
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
$cpassword = $_REQUEST['cpassword'];
$gender = isset($_POST['gender']) ? $_POST['gender'] : '';
$dd = $_REQUEST['dd'];
$mm = $_REQUEST['mm'];
$yyyy = $_REQUEST['yyyy'];

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
function username($username) {
  if ($username == "") {
      echo "Username cannot be empty";
  } else {
      $verify = uniuser($username);
      if ($verify) {
          echo "This username is already taken. Please choose a different username";
      }

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
function emailcheck($email){
    if ($email == "") {
        echo "Email Address Cannot be Empty";
    } else {
        $verify=uniemail($email);
    if($verify){
        echo"this email already taken. Please choose a different email";
    }
        $isValid = true;
        $atPos = strpos($email, "@");
    
        if ($atPos === false || $atPos === 0 || $atPos === strlen($email) - 1) {
            $isValid = false;
            echo "Email must contain '@' symbol not at the beginning or end.";
        } else {
            $username = substr($email, 0, $atPos);
            $domain = strtolower(substr($email, $atPos + 1)); 
    
            if (!ctype_alnum($username) || ctype_digit($username[0])) {
                $isValid = false;
                echo "Username can only contain letters, numbers, and must start with a letter.";
            }
    
            $allowedDomainChars = 'abcdefghijklmnopqrstuvwxyz0123456789.-';
    
            for ($i = 0; $i < strlen($domain); $i++) {
                $char = $domain[$i];
    
                if (strpos($allowedDomainChars, $char) === false) {
                    $isValid = false;
                    echo "Domain must follow a-z, 0-9, -, and . format.";
                    break;
                }
            }
    
            $lastDotPos = strrpos($domain, ".");
            $topLevelDomain = substr($domain, $lastDotPos + 1);
    
            $commonEmailProviders = ['com', 'net', 'org', 'gov', 'edu'];
            $commonOrgProviders = ['gmail', 'yahoo'];
        
            $domainWithoutTLD = substr($domain, 0, $lastDotPos);
    
            if ($lastDotPos === false || $lastDotPos < 2 || $lastDotPos === strlen($domain) - 1 || !ctype_alpha($topLevelDomain) || strlen($topLevelDomain) < 2 || !in_array($topLevelDomain, $commonEmailProviders) || !in_array($domainWithoutTLD, $commonOrgProviders)) {
                $isValid = false;
                echo "Domain must follow a-z, 0-9, -, and . format with a valid top-level domain.";
            }
        }
    
        if ($isValid) {
            return true;
        }
    }
}
function passcheck($password,$cpassword){
if($password=="" || $cpassword==""){
    echo"password field is empty";
}else{
    if($password!=$cpassword){
        echo"Password doesn't match with your confirm password";
    }
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
function gendercheck($gender) {
  if ($gender) {
      return true;
  } else {
      echo "Please select a gender.";
      return false; 
  }
}
function DOBCheck($dd,$mm,$yyyy){
    if (empty($dd) || empty($mm) || empty($yyyy)) {
        echo "Date is invalid: Please fill in all fields.";
      } else {
        if (!is_numeric($dd) || !is_numeric($mm) || !is_numeric($yyyy)) {
          echo "Date is invalid: Please enter numbers for day, month, and year.";
        } else {
          $dd = intval($dd);
          $mm = intval($mm);
          $yyyy = intval($yyyy);
      
          if ($dd < 1 || $dd > 31 || $mm < 1 || $mm > 12 || $yyyy < 1953 || $yyyy > 2005) {
            echo "Date is invalid: Values are outside the allowed ranges.";
          } else {
            $maxDays = 31;
            if ($mm == 4 || $mm == 6 || $mm == 9 || $mm == 11) {
              $maxDays = 30;
            } else if ($mm == 2) {
              $maxDays = 28;
              if ($yyyy % 4 == 0 && ($yyyy % 100 != 0 || $yyyy % 400 == 0)) {
                $maxDays = 29;
              }
            }
      
            if ($dd > $maxDays) {
              echo "Date is invalid: Day is not valid for the selected month.";
            } else {
              return true;
            }
          }
        }
      }

}
if(namecheck($name)&& username($username) && emailcheck($email)&& passcheck($password,$cpassword)&&DOBCheck($dd,$mm,$yyyy)&& gendercheck($gender)){
    $guest = ['name'=>$name,'email'=>$email,'gender'=>$gender,'username'=> $username, 'password'=>$password,'dd'=>$dd ,'mm'=>$mm,'yyyy'=>$yyyy];
    $status = createGuest($guest);
    if($status){
        header('location: ../View/login.php');
    }else{
        echo "DB error! Please try again";
    }


}
?>
