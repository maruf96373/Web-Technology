<?php
require_once('../Model/bookings.php');
$GuestId=$_REQUEST ['guestId'];
if (empty($GuestId)) {
    echo "Error: Guest id is empty.";
} else {
    $status=Delete($GuestId);
    if($status){
       
    header('location:../View/CustomerView.php');
    }else{
        echo"DB error!";
    }
}

?>
