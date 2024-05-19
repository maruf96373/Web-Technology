<?php
require_once('../Model/facilityadmin.php');
$facilityId=$_REQUEST ['facilityId'];
if (empty($facilityId)) {
    echo "Error: Facility id is empty.";
} else {
    $status=Delete($facilityId);
    if($status){
        
    header('location:../View/FacilityView.php');
    }else{
        echo"DB error!";
    }
}


?>
