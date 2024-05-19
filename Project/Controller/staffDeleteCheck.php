<?php
require_once('../Model/staffadmin.php');
$staffId=$_REQUEST ['staffId'];
if (empty($staffId)) {
    echo "Error: Staff id is empty.";
} else {
    $status=Delete($staffId);
    if($status){
       
    header('location:../View/StaffView.php');
    }else{
        echo"DB error!";
    }
}

?>
