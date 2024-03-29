<?php
require_once('../Model/Schedledb.php');
$sid=$_REQUEST['sid'];

     $status = deleteCal($sid);
    if($status){
        header('location: ../View/CalenderAdmin.php');
    }else{
        echo "DB error! Please try again";
    }



?>