<?php
require_once('../Model/packageadmin.php');
$packageId=$_REQUEST ['packageId'];
if (empty($packageId)) {
    echo "Error: Package id is empty.";
} else {
    

    

    $status=Delete($packageId);
    if($status){
       
    header('location:../View/PackageView.php');
    }else{
        echo"DB error!";
    }

}

?>
