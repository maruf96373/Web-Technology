<?php
require_once('../Model/packageadmin.php');
function Checkpackage($packageName) {
    if ($packageName == "") {
        echo " Package Name cannot be empty ";
        return false;
    }
    elseif (strlen($packageName) < 5 || strlen($packageName) > 30) {
        echo "Package Name must be 5 to 30 characters long";
        return false;
    
        } else {
            return true;
        }
    }





function CheckDescription($packageDescription) {
    if ($packageDescription == "") {
        echo " Package Description cannot be empty ";
        return false;
    }
    elseif (strlen($packageDescription) < 10 || strlen($packageDescription) > 100) {
        echo "Package Description must be 10 to 100 characters long";
        return false;
    
        } else {
            return true;
        }
    }


function CheckPrice($price) {
    if ($price == "") {
        echo " Package Price cannot be empty ";
        return false;
    }
    elseif ($price <= 0 || $price < 1000) {
        echo "Price must be greater than 0 and at least 1000 Tk";
        return false;
    } else {
        return true;
    }
}
$packageId = $_REQUEST['packageId'];
$packageName = $_REQUEST['packageName'];
$packageDescription = $_REQUEST['packageDescription'];
$packageCategory = $_REQUEST['packageCatagory'];
$price = $_REQUEST['packagePrice'];


if (Checkpackage($packageName)  && CheckDescription($packageDescription) && CheckPrice($price) ){

    if ($packageId  == "" || $packageName == "" ||$packageDescription == "" || $packageCategory == ""|| $price == ""  ){
       echo "Error: Some fields are empty. Please fill all fields.";
    } 
    else {
        
        $status=Edit($packageId,$packageName,$packageDescription,$packageCategory,$price);
        if($status){
           
        header('location:../View/PackageView.php');
        }else{
            echo"DB error!";
        }
    }
       
       
    
   
}




 ?>  

