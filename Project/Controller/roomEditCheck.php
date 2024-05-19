<?php

require_once('../Model/crudadmin.php');



function CheckNumber($roomNumber) {
    if (!is_numeric($roomNumber) || strlen($roomNumber) != 3 || intval($roomNumber) < 0) {
        echo "Room number must be a 3-digit positive number";
        return false;
    } else {
        
        
            return true;
        }
    }





function CheckCapacity($capacity) {
    if (is_numeric($capacity) && intval($capacity) == $capacity && $capacity > 0 && $capacity < 6) {
        return true;
    } else {
        echo "Capacity must be a positive integer between 1 and 5";
        return false;
    }
}


function CheckPrice($price) {
    if ($price > 0 && $price > 2000 && $price < 10000) {
        return true;
    } else {
        echo "Price must be greater than 0, greater than 2000, and less than 10000";
        return false;
    }
}


function RoomTypeCheck($roomType) {
    if ($roomType == "single" || $roomType == "double" || $roomType == "suite") {
        return true;
    } else {
        echo "Please select a valid room type.";
        return false;
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
    isset($_REQUEST['roomId'], $_REQUEST['roomType'], $_REQUEST['roomNumber'], $_REQUEST['capacity'], $_REQUEST['price'], $_REQUEST['checkinDate'] ,$_REQUEST['checkoutDate'], $_FILES['proPic']['name'])
    && !empty($_REQUEST['roomId']) && !empty($_REQUEST['roomType']) && !empty($_REQUEST['roomNumber']) && !empty($_REQUEST['capacity']) && !empty($_REQUEST['price'])&&!empty($_REQUEST['checkinDate'])&&!empty($_REQUEST['checkoutDate']) && !empty($_FILES['proPic']['name'])
) {
    $roomId = $_REQUEST['roomId'];
    $roomType = $_REQUEST['roomType'];
    $roomNumber = $_REQUEST['roomNumber'];
    $capacity = $_REQUEST['capacity'];
    $price = $_REQUEST['price'];
    $CheckinDate = $_REQUEST['checkinDate'];
    $CheckoutDate = $_REQUEST['checkoutDate'];
   
    $target_file = $_FILES['proPic']['tmp_name'];
    $des = "../Assets/" . $_FILES['proPic']['name'];

    if ( RoomTypeCheck($roomType) && CheckNumber($roomNumber) && CheckCapacity($capacity) && CheckPrice($price) &&  validateFilename()) {
        if (move_uploaded_file($target_file, $des)) {


        $status = Edit($roomId, $roomType, $roomNumber, $capacity, $price,$CheckinDate,$CheckoutDate,$des);
        
        if ($status) {
            header('location:../View/roomView.php');
            exit();
        } else {
            echo "Database error! Unable to edit room.";
        }
    } else {
        echo "Error uploading file.";
    }

}
}
    else {
    echo "Error: Some fields are empty. Please fill all fields.";
}
?>
