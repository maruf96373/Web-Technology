<?php

require_once('../Model/crudadmin.php');
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
if (isset($_POST['roomId'])) {
    $roomId = $_POST['roomId'];
 $response=[];
    $taken = uniId($roomId);
    if ($taken) {
       $response['roomId']="This Id is already taken";
    }else{
        $response['roomId']="valid";
    }
    echo json_encode($response);
} 
else if (isset($_POST['roomNumber'])) {
    $roomNumber = $_POST['roomNumber'];
    $response=[];
    $taken = uniNumber($roomNumber);
    if ($taken) {
        $response['roomNumber']="This number is already taken";
       
}else{
    $response['roomNumber']="valid";
}
echo json_encode($response);
}else {
    echo json_encode(["message" => "Invalid request"]);
    exit;
  }  }else{
function CheckId($roomId) {
    if ($roomId == "") {
        echo "Room Id Cannot be Empty ";
        return false;
        exit;
    }else{
        $taken = uniId($roomId);
    if ($taken) {
      echo "This Id is already taken";
      return false;
    }
    elseif (strlen($roomId) != 4 || !is_numeric($roomId) || intval($roomId) <= 0) {
        echo "Room ID must be a 4-digit positive number";
        return false;
    }
    else {
        return true;
    }
    }
}

function dateCheck($CheckinDate, $CheckoutDate) {
    $currentDate = date('Y-m-d');
    $checkin = date('Y-m-d', strtotime($CheckinDate));
    $checkout = date('Y-m-d', strtotime($CheckoutDate));
    if ($CheckinDate== "" || $CheckoutDate=="") {
        echo "Check in date or Check out date Cannot be Empty ";
        return false;
       
    }
    elseif ($checkin < $currentDate) {
        echo "Check-in date must be a future date.";
        return false;
    } elseif ($checkout <= $checkin) {
        echo "Check-out date must be after the check-in date.";
        return false;
    } elseif ($checkout <= $currentDate) {
        echo "Check-out date must be in the future.";
        return false;
    } else {
        return true;
    }
}

function CheckNumber($roomNumber) {
    if ($roomNumber == "") {
        echo "Room Number Cannot be Empty ";
        return false;
    }else{
        $taken = uniNumber($roomNumber);
        if ($taken) {
            echo "This number is already taken";
            return false;
           
    
    }
    elseif (!is_numeric($roomNumber) || strlen($roomNumber) != 3 || intval($roomNumber) < 0) {
        echo "Room number must be a 3-digit positive number";
        return false;
    } else {
        return true;
    }
    }
}

function CheckCapacity($capacity) {
    if ($capacity == "") {
        echo "Capacity Cannot be Empty ";
        return false;
    }
    elseif (is_numeric($capacity) && intval($capacity) == $capacity && $capacity > 0 && $capacity < 6) {
        return true;
    } else {
        echo "Capacity must be a positive integer between 1 and 5";
        return false;
    }
}

function CheckPrice($price) {
    if ($price == "") {
        echo "Price Cannot be Empty ";
        return false;
    }
    elseif ($price > 0 && $price > 2000 && $price < 10000) {
        return true;
    } else {
        echo "Price must be greater than 0, greater than 2000, and less than 10000";
        return false;
    }
}

function RoomTypeCheck($roomType) {
    if ($roomType == "") {
        echo "Room type Cannot be Empty ";
        return false;
    }
    elseif ($roomType == "single" || $roomType == "double" || $roomType == "suite") {
        return true;
    } else {
        echo "Please select a valid room type.";
        return false;
    }
}

function StatusCheck($Status) {
    if ($Status == "") {
        echo "Status Cannot be Empty ";
        return false;
    }
    elseif ($Status == "available" || $Status == "book") {
        return true;
    } else {
        echo "Please select a valid status.";
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

if 
    (isset($_POST['roomId'], $_POST['roomType'], $_POST['roomNumber'], $_POST['capacity'],$_POST['checkinDate'],$_POST['checkoutDate'], $_POST['price'],$_POST['roomStatus'], $_FILES['proPic']['name']))
   
 {
    $roomId = $_POST['roomId'];
    $roomType = $_POST['roomType'];
    $roomNumber = $_POST['roomNumber'];
    $capacity = $_POST['capacity'];
    $CheckinDate = $_POST['checkinDate'];
    $CheckoutDate = $_POST['checkoutDate'];
    $price = $_POST['price'];
    $Status = $_POST['roomStatus'];
    $target_file = $_FILES['proPic']['tmp_name'];
    $des = "../Assets/" . $_FILES['proPic']['name'];

    if (CheckId($roomId) && RoomTypeCheck($roomType) && CheckNumber($roomNumber) && CheckCapacity($capacity) && dateCheck($CheckinDate, $CheckoutDate) && CheckPrice($price) && StatusCheck($Status) && validateFilename()) {
        if (move_uploaded_file($target_file, $des)) {
            $user = ['roomId' => $roomId, 'roomType' => $roomType, 'roomNumber' => $roomNumber, 'capacity' => $capacity, 'checkinDate' => $CheckinDate, 'checkoutDate' => $CheckoutDate, 'price' => $price, 'roomStatus' => $Status, 'proPic' => $des];
            $status = Add($user);

            if ($status) {
                header('location:../View/roomView.php');
                exit();
            } else {
                echo "Database error! Unable to add room.";
               
            }
        } else {
            echo "Error uploading file.";
           
        }
    }
}}

?>
