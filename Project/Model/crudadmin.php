<?php
require_once('db.php');

function Add($user){
    $conn = dbconnection();
    $sql = "INSERT INTO crudAdmin VALUES ('{$user['roomId']}', '{$user['roomType']}', '{$user['roomNumber']}', '{$user['capacity']}','{$user['price']}','{$user['checkinDate']}','{$user['checkoutDate']}','{$user['roomStatus']}', '{$user['proPic']}')";
    
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}

function uniId($roomId) {
    $conn = dbConnection();
    $sql = "SELECT COUNT(*) FROM crudadmin WHERE roomId = '$roomId'";
    $result = mysqli_query($conn, $sql);
  
    if (!$result) {
        return false;
    } else {
        $row = mysqli_fetch_assoc($result);
        if ($row['COUNT(*)'] > 0) {
            return true; 
        } else {
            return false; 
        }
    }
}

function uniNumber($roomNumber) {
    $conn = dbConnection();
    $sql = "SELECT COUNT(*) FROM crudadmin WHERE roomNumber = '$roomNumber'";
    $result = mysqli_query($conn, $sql);
  
    if (!$result) {
        return false;
    } else {
        $row = mysqli_fetch_assoc($result);
        if ($row['COUNT(*)'] > 0) {
            return true; 
        } else {
            return false; 
        }
    }
}

function viewRoom(){
    $con = dbConnection();
    $sql = "SELECT *, (CASE WHEN roomNumber IN (SELECT roomNumber FROM bookings) THEN 'booked' ELSE 'available' END) AS roomStatus FROM crudadmin";
    $result = mysqli_query($con, $sql);
    $room= [];
    
    while($row = mysqli_fetch_assoc($result)){
        array_push($room, $row);
    }
    
    return $room;
}

function Delete($roomId){
    $conn = dbconnection();
    $sql = "DELETE FROM crudadmin WHERE roomId='$roomId'";
    
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}

function Edit($roomId, $roomType, $roomNumber, $capacity, $price, $checkinDate, $checkoutDate,  $target_file){
    $conn = dbconnection();
   
    $sql = "UPDATE crudadmin SET roomType='$roomType', roomNumber='$roomNumber', capacity='$capacity', price='$price', checkinDate='$checkinDate', checkoutDate='$checkoutDate',  proPic='$target_file' WHERE roomId='$roomId'";
       
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}


function roomEdit($roomId){
    $con = dbConnection();
    $sql = "select * from crudadmin where roomId='{$roomId}'";
    $result = mysqli_query($con, $sql);
    $room = [];

    while($row = mysqli_fetch_assoc($result)){
        array_push($room, $row);
    }

    return $room;
}

function bookRoom($roomNumber, $checkinDate, $checkoutDate) {
    $conn = dbconnection();
    $sql_insert_booking = "INSERT INTO bookings (roomNumber, checkinDate, checkoutDate) VALUES ('$roomNumber', '$checkinDate', '$checkoutDate')";
    
    if (mysqli_query($conn, $sql_insert_booking)) {
       
        $sql_update_room = "UPDATE crudadmin SET status = 'booked' WHERE roomNumber= '$roomNumber'";
        mysqli_query($conn, $sql_update_room);
        return true; 
    } else {
        return false; 
    }
}

?>
