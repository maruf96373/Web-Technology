<?php
require_once('../Model/staffadmin.php');
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    if (isset($_POST['staffId'])) {
        $staffId = $_POST['staffId'];
     $response=[];
        $taken = uniId($staffId);
        if ($taken) {
           $response['staffId']="This Id is already taken";
        }else{
            $response['staffId']="valid";
        }
        echo json_encode($response);
    } 
    else if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $response=[];
        $taken = uniEmail($email);
        if ($taken) {
            $response['email']="This email is already taken";
           
    }else{
        $response['email']="valid";
    }
    echo json_encode($response);
    }else {
        echo json_encode(["message" => "Invalid request"]);
        exit;
      }  }else{

function nameCheck($staffName) {
    if ($staffName == "") {
        echo "Name cannot be empty ";
        return false;
    } else {
        $words = explode(" ", $staffName);

        if (count($words) < 2) {
            echo "Name must contain more than Two Words";
            return false;
        } else {
            return true;
        }
    }
}

function emailCheck($email) {
    if ($email == "") {
        echo "Email Address Cannot be Empty please enter";
        return false;
        exit;
    }
    else{
        $taken = uniEmail($email);
    if ($taken) {
      echo "This email is already taken";
      return false;
    } else {
        $atPos = strpos($email, "@");

        if ($atPos === false || $atPos === 0 || $atPos === strlen($email) - 1) {
            echo "Email must contain '@' symbol .";
            return false;
        } else {
            return true;
        }
    }
}
}
function CheckId($staffId) {
    if ($staffId == "") {
        echo "Staff Id Cannot be Empty ";
        return false;
        exit;
    }
    else{
        $taken = uniId($staffId);
    if ($taken) {
      echo "This Id is already taken";
      return false;
    }
   elseif (strlen($staffId) != 2 || !is_numeric($staffId) || intval($staffId) <= 0) {
        echo "Staff Id must be 2 digits positive number";
        return false;
    } else {
        return true;
    }
}
}

function CheckContact($contact) {
    if ($contact == "") {
        echo "Contact Cannot be Empty";
        return false;
    }
   elseif (strlen($contact) !== 14) {
        echo "Contact must be 14 digits long";
        return false;
    } else if (!in_array(substr($contact, 0, 6), array("+88017", "+88019", "+88018", "+88015", "+88016", "+88013"))) {
        echo "Contact must start with +88017, +88019, +88018, +88015, +88016, or +88013";
        return false;
    } else {
        return true;
    }
}

function AccountCheck($accountStatus) {
    if ($accountStatus == "") {
        echo "Account status Cannot be Empty ";
        return false;
    }
   elseif ($accountStatus == "active" || $accountStatus == "busy" || $accountStatus == "inactive") {
        return true;
    } else {
        echo "Please select a valid status.";
        return false;
    }
}

function checkSalary($salary) {
    if ($salary == "") {
        echo "Salary Cannot be Empty ";
        return false;
    }
    elseif (!is_numeric($salary) || $salary <= 0 || $salary < 3000) {
        echo "Salary must be a positive value greater than 0 or equal to 3000";
        return false;
    } else {
        return true;
    }
}

function validateFilename() {
    if (!isset($_FILES['proPic']) || $_FILES['proPic']['error'] == UPLOAD_ERR_NO_FILE) {
        echo "Please select a picture";
        return false;
    }

    $fileName = $_FILES['proPic']['name'];

    if (empty($fileName)) {
        echo "Please select a picture";
        return false;
    }

    return true;
}

if (isset($_POST['staffId'], $_POST['staffName'], $_POST['email'], $_POST['department'], $_POST['contact'],$_POST['salary'], $_POST['accountStatus'], $_FILES['proPic']['name']) ) {
    $staffId = $_POST['staffId'];
    $staffName = $_POST['staffName'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $contact = $_POST['contact'];
    $salary = $_POST['salary'];
    $accountStatus = $_POST['accountStatus'];
    $target_file = $_FILES['proPic']['tmp_name'];
    $des = "../Assets/" . $_FILES['proPic']['name'];
    
    if (nameCheck($staffName) && emailCheck($email) && CheckId($staffId) && CheckContact($contact) && checkSalary($salary) && AccountCheck($accountStatus) && validateFilename()) {
        if (move_uploaded_file($target_file, $des)) {
            $user = [
                'staffId' => $staffId,
                'staffName' => $staffName,
                'email' => $email,
                'department' => $department,
                'contact' => $contact,
                'salary' => $salary,
                'accountStatus' => $accountStatus,
                'proPic' => $des
            ];
            $status = Add($user);
            if ($status) {
                header('location:../View/StaffView.php');
                exit();
            } else {
                echo "Database error! Unable to add staff.";
            }
        } else {
            echo "Error uploading file.";
        }
    }
}} 

?>
