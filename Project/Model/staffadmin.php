<?php
require_once('db.php');
function Add($user){
    $conn=dbconnection();
    $sql="insert into staffadmin values ('{$user['staffId']}','{$user['staffName']}','{$user['email']}','{$user['department']}','{$user['contact']}','{$user['salary']}','{$user['accountStatus']}','{$user['proPic']}')";
    if (mysqli_query($conn, $sql)) {
        return true;
    }else{
        return false;
    }
   
}

function uniId($staffId) {
    $conn = dbConnection();
    $sql = "SELECT COUNT(*) FROM staffadmin WHERE staffId = '$staffId'";
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
  function uniEmail($email) {
    $conn = dbConnection();
    $sql = "SELECT COUNT(*) FROM staffadmin WHERE email= '$email'";
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
  
  


function viewStaff(){

    $con = dbConnection();
    $sql = "select * from staffadmin";
    $result = mysqli_query($con, $sql);
    $staff = [];
    
    while($row = mysqli_fetch_assoc($result)){
        array_push($staff, $row);
    }
return $staff;
}
function Delete($staffId){
    
        $conn = dbconnection();
    
        $sql = "DELETE FROM staffadmin WHERE staffId='$staffId'";
    
        if (mysqli_query($conn, $sql)) {
    
            return true;
    }else{
        return false;
    }
}
function Edit($staffId,$staffName,$email,$department,$contact,$salary,$accountStatus, $target_file,$des){
    
    $conn = dbconnection();

        
    $sql = "UPDATE staffadmin SET staffName='$staffName',email='$email',department ='$department', contact='$contact',salary='$salary',accountStatus='$accountStatus',proPic=' $target_file',proPic='$des' WHERE staffId='$staffId'";
       
    if (mysqli_query($conn, $sql)) {
      
        return true;
    }else{
        return false;
    }
}


function SearchStaff($staffId){
    
    $con = dbConnection();
    $sql = "SELECT * From staffadmin  WHERE staffId='$staffId' ";
    $result = mysqli_query($con, $sql);
 
    
    $staff = [];
  
    while($row = mysqli_fetch_assoc($result)){
        array_push($staff, $row);
    }
  return $staff;
  
  }
  function staffEdit($staffId){
    $con = dbConnection();
    $sql = "SELECT * FROM staffadmin WHERE staffId='$staffId'";
    $result = mysqli_query($con, $sql);
    $staff = [];

    while($row = mysqli_fetch_assoc($result)){
        array_push($staff, $row);
    }

    return $staff;
}
    


?>