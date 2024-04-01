<?php
require_once('../Model/empdb.php');
$user=$_REQUEST['uname'];

     $status = deleteemp($uname);
    if($status){
        header('location: ../View/emp.php');
    }else{
        echo "DB error! Please try again";
    }



?>