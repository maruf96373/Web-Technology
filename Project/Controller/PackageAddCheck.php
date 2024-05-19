<?php
require_once('../Model/packageadmin.php');
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    if (isset($_POST['packageId'])) {
        $packageId = $_POST['packageId'];
     $response=[];
        $taken = uniId($packageId);
        if ($taken) {
           $response['packageId']="This Id is already taken";
        }else{
            $response['packageId']="valid";
        }
        echo json_encode($response);
    } 
    else if (isset($_POST['packageName'])) {
        $packageName = $_POST['packageName'];
        $response=[];
        $taken =uniPackage($packageName);
        if ($taken) {
            $response['packageName']="This package Name is already taken";
           
    }else{
        $response['packageName']="valid";
    }
    echo json_encode($response);
    }else {
        echo json_encode(["message" => "Invalid request"]);
        exit;
      }  }else{

function Checkpackage($packageName) {
    if ($packageName == "") {
        echo " Package Name cannot be empty ";
        return false;
        exit;
    }
    else{
        $taken =uniPackage($packageName);
    if ($taken) {
      echo "This Name is already taken";
      return false;
    }
    elseif (strlen($packageName) < 5 || strlen($packageName) > 30) {
        echo "Package Name must be 5 to 30 characters long";
        return false;
    
        } else {
            return true;
        }
    }

}
function CheckId($packageId) {
    if ($packageId == "") {
        echo " Package Id cannot be empty ";
        return false;
        exit;
    }
    else{
        $taken =uniId($packageId);
    if ($taken) {
      echo "This Id is already taken";
      return false;
    }
    elseif (strlen($packageId) !== 3  || !is_numeric($packageId) || intval($packageId) <= 0) {
        echo "Package Id must be a 3-digit positive number";
        return false;
    
        } else {
            return true;
        }
    }
}

function CheckDescription($packageDescription) {
    if ($packageDescription == "") {
        echo " Package Description cannot be empty ";
        return false;
    }
    elseif (strlen($packageDescription) < 10 || strlen($packageDescription) > 100) {
        echo "Package Description must be 10 to 100 characters long";
        return false;
    
        } else {
            return true;
        }
    }


function CheckPrice($price) {
    if ($price == "") {
        echo " Package Price cannot be empty ";
        return false;
    }
    elseif ($price <= 0 || $price < 1000) {
        echo "Price must be greater than 0 and at least 1000 Tk";
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
    isset($_POST['packageId'], $_POST['packageName'], $_POST['packageDescription'], $_POST['packageCatagory'], $_POST['packagePrice'], $_FILES['proPic']['name'])
    
) {
    $packageId = $_POST['packageId'];
    $packageName = $_POST['packageName'];
    $packageDescription = $_POST['packageDescription'];
    $packageCategory = $_POST['packageCatagory'];
    $price = $_POST['packagePrice'];
    $target_file = $_FILES['proPic']['tmp_name'];
    $des = "../Assets/" . $_FILES['proPic']['name'];

    if (Checkpackage($packageName) && CheckId($packageId) && CheckDescription($packageDescription) && CheckPrice($price) && validateFilename()) {
        if (move_uploaded_file($target_file, $des)) {
            $user = [
                'packageId' => $packageId,
                'packageName' => $packageName,
                'packageDescription' => $packageDescription,
                'packageCatagory' => $packageCategory,
                'packagePrice' => $price,
                'proPic' => $des
            ];
            $status = Add($user);
            if ($status) {
                header('location:../View/PackageView.php');
                exit();
            } else {
                echo "Database error! Unable to add package.";
            }
        } else {
            echo "Error uploading file.";
        }
    }
}} 

?>
