<?php
require_once('../Model/guestdb.php');
session_start();
$user = $_SESSION['username'];
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
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
if(namecheck($name) && emailcheck($email)&& DOBCheck($dd,$mm,$yyyy)&& gendercheck($gender)){
    $guest = ['name'=>$name,'email'=>$email,'gender'=>$gender,'dd'=>$dd ,'mm'=>$mm,'yyyy'=>$yyyy];
    $status = updateGuest($guest,$user);
    if($status){
        header('location: ../View/Profile.php');
    }else{
        echo "DB error! Please try again";
    }


}
?>