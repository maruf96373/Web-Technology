<?php
require_once('../Model/facilityadmin.php');
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    if (isset($_POST['facilityId'])) {
        $facilityId = $_POST['facilityId'];
     $response=[];
        $taken = uniId($facilityId);
        if ($taken) {
           $response['facilityId']="This Id is already taken";
        }else{
            $response['facilityId']="valid";
        }
        echo json_encode($response);
    } 
    else if (isset($_POST['facilityName'])) {
        $facilityName = $_POST['facilityName'];
        $response=[];
        $taken = uniFacility($facilityName);
        if ($taken) {
            $response['facilityName']="This facility Name is already taken";
           
    }else{
        $response['facilityName']="valid";
    }
    echo json_encode($response);
    }else {
        echo json_encode(["message" => "Invalid request"]);
        exit;
      }  }else{
   
function CheckFacility($facilityName) {
    if ($facilityName == "") {
        echo " Facility Name cannot be empty ";
        return false;
        exit;
    }
    else{
        $taken =uniFacility($facilityName);
    if ($taken) {
      echo "This Name is already taken";
      return false;
    }
    elseif (strlen($facilityName) < 2 || strlen($facilityName) > 20) {
        echo "Facility Name must be 2 to 20 characters long";
        return false;
    } else {
        
            return true;
        }
    }
}

function CheckId($facilityId) {
    if ($facilityId== "") {
        echo " Facility Id cannot be empty ";
        return false;
        exit;
    }
    else{
        $taken =uniId($facilityId);
    if ($taken) {
      echo "This Id is already taken";
      return false;
    }
    elseif (strlen($facilityId) !== 3 || !is_numeric($facilityId) || intval($facilityId) <= 0) {
        echo "Facility Id must be 3 characters long and greater than 0";
        return false;
    } else {
       
            return true;
        }
    }
}

function CheckPrice($price) { 
    if ($price == "") {
        echo " Price cannot be empty ";
        return false;
    }
    elseif ($price > 0 && $price <= 500) { 
        return true;
    } else {
        echo "Price must be greater than 0 and less than or equal to 500";
        return false;
    }
}

function CheckDescription($facilityDescription) {
    if ($facilityDescription == "") {
        echo " Facility Description  cannot be empty ";
        return false;
    }
    elseif (strlen($facilityDescription) < 5 || strlen($facilityDescription) > 30) {
        echo "Facility Description must be 5 to 29 characters long";
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

function validateFacilityCategory($Catagory) {
    if (empty($Catagory)) {
        echo "Please select a facility category.";
        return false;
    } else {
        echo "Selected facility category: " . $Catagory;
        return true;
    }
}


if (
    isset($_REQUEST['facilityId'], $_REQUEST['facilityName'], $_REQUEST['facilityDescription'], $_REQUEST['facilityCatagory'], $_REQUEST['Fprice'], $_FILES['proPic']['name'])
    
     ) {
    $facilityId = $_POST['facilityId'];
    $facilityName =  $_POST['facilityName'];
    $facilityDescription =  $_POST['facilityDescription'];
    $Catagory =  $_POST['facilityCatagory'];
    $price =  $_POST['Fprice']; 
    $target_file = $_FILES['proPic']['tmp_name'];
    $des = "../Assets/" . $_FILES['proPic']['name'];
    if (CheckFacility($facilityName) && CheckId($facilityId) && CheckDescription($facilityDescription) && CheckPrice($price) && validateFilename() &&validateFacilityCategory($Catagory)) { 
        if (move_uploaded_file($target_file, $des)) {
            $user = [
                'facilityId' => $facilityId,
                'facilityName' => $facilityName,
                'facilityDescription' => $facilityDescription,
                'facilityCatagory' => $Catagory,
                'Fprice'=>$price, 
                'proPic' => $des
            ];
            $status = Add($user);
            if ($status) {
                header('location:../View/FacilityView.php');
                exit();
            } else {
                echo "Database error! Unable to add facility.";
            }
        } else {
            echo "Error uploading file.";
        }
    }
} }
?>
