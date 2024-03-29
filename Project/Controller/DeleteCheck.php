<?php
require_once('../Model/guestdb.php');
$username=$_REQUEST['username'];

     $status = deleteGuest($username);
    if($status){
        header('location: ../View/GuestAdmin.php');
    }else{
        echo "DB error! Please try again";
    }



?>