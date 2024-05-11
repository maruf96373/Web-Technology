<?php
    require_once('../model/userModel.php');

    $id = $_REQUEST['proID'];
    $pname= $_REQUEST['Proname'];
    $quantity= $_REQUEST['quantity'];
    $price= $_REQUEST['price'];


    $status= updateProduct($proid, $proname, $quantity, $price);

    if($status){
        echo "update successful.";
    }else{
        echo "Update Failed! Please try again.";
    } 
?>