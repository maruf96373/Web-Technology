<?php
require_once('BookingCustomerDb.php');
function booking($user){
  $conn = dbconnection();
  $sql = "INSERT INTO bookings VALUES ('{$user['guestId']}', '{$user['capacity']}', '{$user['roomNumber']}', '{$user['roomType']}', '{$user['price']}', '{$user['checkinDate']}', '{$user['checkoutDate']}')";
  
  if(mysqli_query($conn, $sql)){
     return true;
  } else {
      return false;
  }
}

function updateGuestPic($GuestId, $target_file) {

  $con = dbConnection();
  $sql = "UPDATE bookings SET proPic = '$target_file' WHERE guestId = '$GuestId'";

  if (mysqli_query($con, $sql)) {
      return true;
  } else {
      return false;
  }
}

function uniId($GuestId) {
    $conn = dbConnection();
    $sql = "SELECT COUNT(*) FROM bookings WHERE guestId = '$GuestId'";
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
  
  function search($GuestNumber, $roomType, $Price, $CheckinDate, $CheckoutDate) {
    $conn = dbconnection();
   
    $sql = "SELECT * FROM crudadmin 
            WHERE capacity >= '$GuestNumber' 
              AND roomType = '$roomType' 
              AND price <= '$Price' 
              AND checkinDate <= '$CheckinDate' 
              AND checkoutDate >= '$CheckoutDate'
              AND roomNumber NOT IN (
                  SELECT roomNumber FROM bookings 
                  WHERE (checkinDate BETWEEN '$CheckinDate' AND '$CheckoutDate') 
                   AND (checkoutDate BETWEEN '$CheckinDate' AND '$CheckoutDate')
              )";

    $result = mysqli_query($conn, $sql);
    $room = [];

    while($row = mysqli_fetch_assoc($result)){
        array_push($room, $row);
    }

    return $room; 
}



function getRoom($RoomNumber) {
  $con = dbConnection();
  $sql = "SELECT * FROM crudadmin WHERE roomNumber='$RoomNumber' ";
  $result = mysqli_query($con, $sql);
  $room = [];

  while ($row = mysqli_fetch_assoc($result)) {
      array_push($room, $row);
  }
  return $room;
}



function viewCustomer(){

  $con = dbConnection();
  $sql = "select * from bookings";
  $result = mysqli_query($con, $sql);
  $guest = [];
  
  while($row = mysqli_fetch_assoc($result)){
      array_push($guest, $row);
  }
return $guest;
}
function Delete($GuestId){
  
      $conn = dbconnection();
  
      $sql = "DELETE FROM bookings WHERE guestId='$GuestId'";
  
      if (mysqli_query($conn, $sql)) {
  
          return true;
  }else{
      return false;
  }
}
function Edit($GuestId,$GuestNumber,$RoomType,$CheckinDate,$CheckoutDate,$Price) {
  
  $conn = dbconnection();

      
  $sql = "UPDATE bookings SET capacity='$GuestNumber',roomType='$RoomType',checkinDate ='$CheckinDate', checkoutDate='$CheckoutDate',price='$Price' WHERE guestId='$GuestId'";
     
  if (mysqli_query($conn, $sql)) {
    
      return true;
  }else{
      return false;
  }
}
function SearchCustomer($GuestId){
  
  $con = dbConnection();
  $sql = "SELECT * From bookings  WHERE guestId='$GuestId' ";
  $result = mysqli_query($con, $sql);
 
    
    $guest = [];
  
    while($row = mysqli_fetch_assoc($result)){
        array_push($guest, $row);
    }
  return $guest;
  
  }
  function guestEdit($GuestId){
    $con = dbConnection();
    $sql = "SELECT * From bookings  WHERE guestId='$GuestId' ";
    $result = mysqli_query($con, $sql);
    $guest = [];

    while($row = mysqli_fetch_assoc($result)){
        array_push($guest, $row);
    }

    return $guest;
}

  
  




?>