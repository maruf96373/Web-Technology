<?php

require_once('../Model/bookings.php');

$GuestId=$_REQUEST['guestId'];
$GuestNumber=$_REQUEST['capacity'];
$RoomType=$_REQUEST['roomType'];
$CheckinDate=$_REQUEST['checkinDate'];
$CheckoutDate=$_REQUEST['checkoutDate'];
$PriceRange=$_REQUEST['price'];
function dateCheck($CheckinDate, $CheckoutDate) {
    $currentDate = date('Y-m-d');
    $checkin = date('Y-m-d', strtotime($CheckinDate));
    $checkout = date('Y-m-d', strtotime($CheckoutDate));

    if ($checkin < $currentDate) {
        echo "Check-in date must be a future date.";
        return false;
    }  elseif ($checkout<= $checkin) {
        echo"Check-out date must be after the check-in date.";
        return false;
    } elseif ($checkout<= $currentDate) {
        echo"Check-out date must be in the future.";
        return false;
    } else {
        return true;
    }
}




function CheckId($GuestId) {
    if (strlen($GuestId) < 5) {
        echo "Guest Id  must be at least 5 digit long";
        return false;
        
    } 
       
            else{
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


function RoomTypeCheck($roomType) {
    if ($roomType == "single" || $roomType == "double" || $roomType == "suite") {
        return true;
    } else {
        echo "Please select a valid room type.";
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

if($GuestId==""||$GuestNumber==""||$RoomType==""||$CheckinDate==""||$CheckoutDate==""||$PriceRange==""){
     
    echo "Something is Null";
}
else{    
    if(CheckId($GuestId) && CheckCapacity($GuestNumber) && RoomTypeCheck($RoomType) &&  CheckPrice($PriceRange)&& dateCheck($CheckinDate ,$CheckoutDate)){
    $status=Edit($GuestId,$GuestNumber,$RoomType,$CheckinDate,$CheckoutDate,$PriceRange);
   
    if($status){
       
    header('location:../View/CustomerView.php');
}else{
    echo"DB error!";
}
}
} 


     
    
    




 ?>  


