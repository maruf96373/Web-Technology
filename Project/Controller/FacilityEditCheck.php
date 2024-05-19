<?php
require_once('../Model/facilityadmin.php');
function CheckFacility($facilityName) {
    if (strlen($facilityName) < 2 || strlen($facilityName) > 20) {
        echo "Facility Name must be 2 to 20 characters long";
        return false;
    } else {
       
       
            return true;
        }
}



function CheckPrice($price) { 
    if ($price > 0 && $price <= 500) { 
        return true;
    } else {
        echo "Price must be greater than 0 and less than or equal to 500";
        return false;
    }
}

function CheckDescription($facilityDescription) {
    if (strlen($facilityDescription) < 5 || strlen($facilityDescription) > 30) {
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



if (
    isset($_REQUEST['facilityId'], $_REQUEST['facilityName'], $_REQUEST['facilityDescription'], $_REQUEST['facilityCatagory'], $_REQUEST['Fprice'], $_FILES['proPic']['name'])
    && !empty($_REQUEST['facilityId']) && !empty($_REQUEST['facilityName']) && !empty($_REQUEST['facilityDescription']) && !empty($_REQUEST['facilityCatagory']) && !empty($_REQUEST['Fprice']) && !empty($_FILES['proPic']['name'])
     ) {
    $facilityId = $_REQUEST['facilityId'];
    $facilityName = $_REQUEST['facilityName'];
    $facilityDescription = $_REQUEST['facilityDescription'];
    $Catagory = $_REQUEST['facilityCatagory'];
    $price = $_REQUEST['Fprice']; 
    $target_file = $_FILES['proPic']['tmp_name'];
    $des = "../Assets/" . $_FILES['proPic']['name'];
    if (CheckFacility($facilityName)  && CheckDescription($facilityDescription) && CheckPrice($price) && validateFilename()) { 
        if (move_uploaded_file($target_file, $des)) {
       
        $status=Edit($facilityId,$facilityName,$facilityDescription,$Catagory,$price,$des);
        if($status){
           
        header('location:../View/FacilityView.php');
        exit();
    } else {
        echo "Database error! Unable to add facility.";
    }
} else {
    echo "Error uploading file.";
}
}
} else {
echo "Some fields are empty. Please fill all fields.";
}

    


 ?>  


