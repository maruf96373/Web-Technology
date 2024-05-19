<?php
require_once('../Model/guestdb.php');
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    if (isset($_POST['username'])) {
      $username = $_POST['username'];
      $taken = uniuser($username);
      $response = [];
      if ($taken) {
        $response['username'] = "This username is already taken. Please choose a different username";
      } else {
        $response['username'] = "valid";
      }
      echo json_encode($response);
    } elseif (isset($_POST['email'])) {
      $email = $_POST['email'];
      $taken = uniemail($email);
      $response = [];
      if ($taken) {
        $response['email'] = "This Email is already taken. Please choose a different email";
      } else {
        $response['email'] = "valid";
      }
      echo json_encode($response);
    } else {
      echo json_encode(["message" => "Invalid request"]);
      exit;
    }
  }else{
  
  
        $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : '';
        $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
        $username = isset($_REQUEST['username']) ? $_REQUEST['username'] : '';
        $password = isset($_REQUEST['password']) ? $_REQUEST['password'] : '';
        $cpassword = isset($_REQUEST['cpassword']) ? $_REQUEST['cpassword'] : '';
        $gender = isset($_REQUEST['gender']) ? $_REQUEST['gender'] : '';
        $dd = isset($_REQUEST['dd']) ? $_REQUEST['dd'] : '';
$mm = isset($_REQUEST['mm']) ? $_REQUEST['mm'] : '';
$yyyy = isset($_REQUEST['yyyy']) ? $_REQUEST['yyyy'] : '';

        if (namecheck($name) && username($username) && emailcheck($email) && passcheck($password, $cpassword) && DOBCheck($dd, $mm, $yyyy) && gendercheck($gender)) {
            $guest = [
                'name' => $name,
                'email' => $email,
                'gender' => $gender,
                'username' => $username,
                'password' => $password,
                'dd' => $dd,
                'mm' => $mm,
                'yyyy' => $yyyy
            ];
            $status = createGuest($guest);
            if ($status) {
                header('location: ../View/login.php');
                exit;
            } else {
                echo "DB error! Please try again";
            }
        }}
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
        return false;
    } else {
        $taken = uniuser($username);
        if ($taken) {
            echo "This username is already taken. Please choose a different username";
            return false;
        }
        if (strlen($username) < 5) {
            echo "Username must be at least 5 characters long";
            return false;
        }
  
        $validChars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_";
  
        for ($i = 0; $i < strlen($username); $i++) {
            $char = $username[$i];
            if (strpos($validChars, $char) === false) {
                echo "Username can only contain letters, numbers, and underscores";
                return false;
            }
        }
  
        return true;
    }
}

function emailcheck($email) {
    if (empty($email)) {
        echo "Email Address Cannot be Empty";
        return false;

      }
    
      if (uniemail($email)) {
        echo "This email is already taken. Please choose a different email";
        return false;

      }
    
      $atPos = strpos($email, "@");
    
      if ($atPos === false || $atPos === 0 || $atPos === strlen($email) - 1) {
        echo "Email must contain '@' symbol not at the beginning or end";
        return false;

      }
    
      $username = substr($email, 0, $atPos);
      $domain = strtolower(substr($email, $atPos + 1));
    

      if (!ctype_alnum($username) || ctype_digit($username[0])) {
        echo "Username can only contain letters, numbers, and must start with a letter";
        return false;

      }

      $allowedDomainChars = 'abcdefghijklmnopqrstuvwxyz0123456789-';
      for ($i = 0; $i < strlen($domain); $i++) {
        $char = $domain[$i];
        if (strpos($allowedDomainChars, $char) === true) {
            echo "Domain must follow a-z, 0-9, -, and . format";
          return false;

        }
      }
      $lastDotPos = strrpos($domain, ".");
      if ($lastDotPos === false || $lastDotPos < 2 || $lastDotPos === strlen($domain) - 1) {
        echo "Invalid Top-Level Domain";
        return false;

      }
    
      $topLevelDomain = substr($domain, $lastDotPos + 1);
      if (strlen($topLevelDomain) < 2) {
        echo "Invalid Top-Level Domain";
        return false;

      }
    
      $validTLDs = ['com', 'net', 'org', 'gov', 'edu'];
      if (!in_array($topLevelDomain, $validTLDs)) {
        echo "This email domain is not currently supported";
        return false;

      }
    
      return true;
}

function passcheck($password, $cpassword) {
    if ($password == "" || $cpassword == "") {
        echo "Password field is empty";
        return false;
    } else {
        if ($password != $cpassword) {
            echo "Password doesn't match with your confirm password";
            return false;
        }

        if (strlen($password) < 8) {
            echo "Password must be at least 8 characters long";
            return false;
        }

        $validChars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_";
        for ($i = 0; $i < strlen($password); $i++) {
            $char = $password[$i];
            if (strpos($validChars, $char) === false) {
                echo "Password can only contain letters, numbers, and underscores";
                return false;
            }
        }
    }
    return true;
}

function gendercheck($gender) {
    if ($gender) {
        return true;
    } else {
        echo "Please select a gender";
        return false;
    }
}

function DOBCheck($dd, $mm, $yyyy) {
    if (empty($dd) || empty($mm) || empty($yyyy)) {
        echo "Date is invalid: Please fill in all fields";
        return false;
    } else {
        if (!is_numeric($dd) || !is_numeric($mm) || !is_numeric($yyyy)) {
            echo "Date is invalid: Please enter numbers for day, month, and year";
            return false;
        } else {
            $dd = intval($dd);
            $mm = intval($mm);
            $yyyy = intval($yyyy);
        
            if ($dd < 1 || $dd > 31 || $mm < 1 || $mm > 12 || $yyyy < 1953 || $yyyy > 2005) {
                echo "Date is invalid: Values are outside the allowed ranges";
                return false;
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
                    echo "Date is invalid: Day is not valid for the selected month";
                    return false;
                } else {
                    return true;
                }
            }
        }
    }
}




?>
