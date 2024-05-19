<?php
require_once('../Model/staffadmin.php');


    function nameCheck($staffName){
        if ($staffName == "") {
            echo "Name cannot be empty";
        } else {
            $words = explode(" ", $staffName);
        
            function hasAtLeastTwoWords($words) {
                return (count($words) >= 2);
            }
        
        if (!hasAtLeastTwoWords($words)) {
            echo "Name  must contains more than Two Words";
        }
        else {
            return true;
        }
        }
        }
        function emailCheck($email){
        if ($email == "") {
            echo "Email Address Cannot be Empty";
        } else {
            $isValid = true;
            $atPos = strpos($email, "@");
        
            if ($atPos === false || $atPos === 0 || $atPos === strlen($email) - 1) {
                $isValid = false;
                echo "Email must contain '@' symbol .";
            }
            else {
                
                
                    return true;
                }
          
            
               
            }
            
            
        
            if ($isValid) {
               
                    return true;
            }
        }
        
        
        
        function CheckContact($contact) {
           
            if (strlen($contact) !== 14) {
                echo "Contact must be 14 digits long";
                return false;
            }
            
            
            if (!in_array(substr($contact, 0, 6), array("+88017", "+88019", "+88018", "+88015", "+88016", "+88013"))) {
                echo "Contact must start with +88017, +88019, +88018, +88015, +88016, or +88013";
                return false;
            }
        
            
            
            
            return true;
        }
        
        
        
        function checkSalary($salary) {
            if (!is_numeric($salary) || $salary <= 0 || $salary < 3000) {
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
        
        if (
            isset($_REQUEST['staffId'], $_REQUEST['staffName'], $_REQUEST['email'], $_REQUEST['department'], $_REQUEST['contact'], $_REQUEST['salary'], $_REQUEST['accountStatus'], $_FILES['proPic']['name'])
            && !empty($_REQUEST['staffId']) && !empty($_REQUEST['staffName']) && !empty($_REQUEST['email']) && !empty($_REQUEST['department']) && !empty($_REQUEST['contact']) && !empty($_REQUEST['salary']) && !empty($_REQUEST['accountStatus']) && !empty($_FILES['proPic']['name'])
        ) {
            $staffId = $_REQUEST['staffId'];
            $staffName = $_REQUEST['staffName'];
            $email = $_REQUEST['email'];
            $department = $_REQUEST['department'];
            $contact = $_REQUEST['contact'];
            $salary = $_REQUEST['salary'];
            $accountStatus = $_REQUEST['accountStatus'];
            $target_file = $_FILES['proPic']['tmp_name'];
                $des = "../Assets/" . $_FILES['proPic']['name'];
            
            if (nameCheck($staffName) && emailCheck($email) && CheckContact($contact) && CheckSalary($salary) &&  validateFilename()) {
                
                
                    if (move_uploaded_file($target_file, $des)) {
       
        $status = Edit($staffId, $staffName, $email, $department, $contact, $salary, $accountStatus,  $target_file,$des);

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

} else {
echo "Error: Some fields are empty. Please fill all fields.";
}



?>
