<?php
require_once('db.php');
function Add($user){
    $conn=dbconnection();
    $sql="INSERT INTO facilityadmin VALUES  ('{$user['facilityId']}','{$user['facilityName']}','{$user['facilityDescription']}','{$user['facilityCatagory']}','{$user['Fprice']}','{$user['proPic']}')";
    
    if (mysqli_query($conn, $sql)) {
        return true;
    }else{
        return false;
    }
   
}
function getFacility($facilityId){ 

  $con = dbConnection();
  $sql = "SELECT * FROM facilityadmin WHERE facilityId='$facilityId' ";
  $result = mysqli_query($con, $sql);
$facility = [];

while($row = mysqli_fetch_assoc($result)){
  array_push($facility, $row);
}
return $facility;

}

function uniId($facilityId) {
    $conn = dbConnection();
    $sql = "SELECT COUNT(*) FROM facilityadmin WHERE facilityId = '$facilityId'";
    $result = mysqli_query($conn, $sql);
  
    if (!$result) {
      return false;
    } else {
      $row = mysqli_fetch_assoc($result);
      if ($row['COUNT(*)'] > 0) {
        return true; 
      } else {
        return false; 
      }
    }
  }
  function uniFacility($facilityName) {
    $conn = dbConnection();
    $sql = "SELECT COUNT(*) FROM facilityadmin WHERE facilityName = '$facilityName'";
    $result = mysqli_query($conn, $sql);
  
    if (!$result) {
      return false;
    } else {
      $row = mysqli_fetch_assoc($result);
      if ($row['COUNT(*)'] > 0) {
        return true; 
      } else {
        return false; 
      }
    }
  }
  
  


function viewFacility(){

    $con = dbConnection();
    $sql = "select * from facilityadmin";
    $result = mysqli_query($con, $sql);
    $facility = [];
    
    while($row = mysqli_fetch_assoc($result)){
        array_push($facility, $row);
    }
return $facility;
}
function Delete($facilityId){
    
    $conn = dbconnection();

    $sql = "DELETE FROM facilityadmin WHERE facilityId='$facilityId'";

    
        if (mysqli_query($conn, $sql)) {
    
            return true;
    }else{
        return false;
    }
}
function Edit($facilityId,$facilityName,$facilityDescription,$Catagory,$price,$target_file){
    
    $conn = dbconnection();

        
    $sql = "UPDATE facilityadmin SET facilityName='$facilityName',facilityDescription='$facilityDescription', facilityCatagory='$Catagory',Fprice='$price', proPic='$target_file' WHERE facilityId='$facilityId' ";
       
    if (mysqli_query($conn, $sql)) {
      
        return true;
    }else{
        return false;
    }
}
function facilityEdit($facilityId){
  $con = dbConnection();
  $sql = "SELECT * FROM facilityadmin WHERE facilityId='$facilityId' ";
  $result = mysqli_query($con, $sql);
  $facility= [];

  while($row = mysqli_fetch_assoc($result)){
      array_push($facility, $row);
  }

  return $facility;
}
?>