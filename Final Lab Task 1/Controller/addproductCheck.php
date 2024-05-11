<?php
    require_once('../model/userModel.php');

    $pname= $_REQUEST['name'];
    $quantity= $_REQUEST['quantity'];
    $price= $_REQUEST['price'];

    $product= ['Name'=>$pname, 'Quantity'=> $quantity, 'Price'=> $price];
    $status= addProduct($product);

    if($status){
        echo "Add successful.";
    }else{
        echo "Add Failed! Please try again.";
    } 
?>