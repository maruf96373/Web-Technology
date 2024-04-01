<?php 
    require_once('db.php');
    function getAllemp(){
        $con = dbConnection();
        $sql = "select * from emp";
        $result = mysqli_query($con, $sql);
      $emp = [];

        while($row = mysqli_fetch_assoc($result)){
            array_push($emp, $row);
        }

        return $emp;
    }
    function uniemp($user) {
        $conn=dbconnection();
        $sql = "SELECT COUNT(*) FROM emp WHERE uname = '$user'";
        $result = mysqli_query($conn, $sql);
        
        if (!$result) {
          return false;
        } else {
          $row = mysqli_fetch_assoc($result);
          if ($row['COUNT(*)'] > 0) {
            return true;
          }else{
            return false;
          }
        }

    }
    
    function createemp($emp){
      $con = dbConnection();
      $name = mysqli_real_escape_string($con, $emp['name']);
      $contact = mysqli_real_escape_string($con,$emp['contact']);
      $user = mysqli_real_escape_string($con,$emp['uname']);
      $password = mysqli_real_escape_string($con,$emp['password']);
     
     
      $sql = "INSERT INTO emp (name,contact, uname,password ) 
              VALUES ('$name','$contact', '$user', '$password')";       
  
      if(mysqli_query($con, $sql)){
          return true;
      }else{
          return false;
      }
  }
  function uemp($user){
    $con = dbConnection();
    $sql = "select * from emp where uname='{$user}'";
    $result = mysqli_query($con, $sql);
    $schedule = [];

    while($row = mysqli_fetch_assoc($result)){
        array_push($schedule, $row);
    }

    return $schedule;
}
function upemp($emp,$user) {
  $con = dbConnection();
  $sql = "UPDATE emp SET ";
  $update_fields = array();
  if (!empty($emp['name'])) {
      $update_fields[] = "name='" . mysqli_real_escape_string($con, $emp['name']) . "'";
  }
  if (!empty($emp['contact'])) {
      $update_fields[] = "contact='" . mysqli_real_escape_string($con, $emp['contact']) . "'";
  }
  if (!empty($emp['password'])) {
    $update_fields[] = "password='" . mysqli_real_escape_string($con, $emp['password']) . "'";
}
  
  $sql .= implode(", ", $update_fields);
  $sql .= " WHERE uname='" . mysqli_real_escape_string($con, $user) . "'";
  $result = mysqli_query($con, $sql);
  if ($result) {
      return true;
  } else {
      return false;
  }}
  function deleteemp($user){
    $con = dbConnection();
    $sql = "delete from emp where sid='{$user}'";
    $result = mysqli_query($con, $sql);
    if(mysqli_query($con, $sql)){
        return true;
    }else{
        return false;
    }
}
    ?>