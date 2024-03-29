<?php 
    require_once('db.php');
    function getAllSchedule(){
        $con = dbConnection();
        $sql = "select * from calender";
        $result = mysqli_query($con, $sql);
      $Calender = [];

        while($row = mysqli_fetch_assoc($result)){
            array_push($Calender, $row);
        }

        return $Calender;
    }
    function uniId($sid) {
        $conn=dbconnection();
        $sql = "SELECT COUNT(*) FROM calender WHERE sid = '$sid'";
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
    
    function meetingExist($hh,$min,$meridiun,  $department, $dd,$mm,$yyyy){
      $conn=dbconnection();
      $dd = mysqli_real_escape_string($conn,$dd);
      $mm = mysqli_real_escape_string($conn,$mm);
      $yyyy= mysqli_real_escape_string($conn,$yyyy);
      $hh = mysqli_real_escape_string($conn, $hh);
      $min = mysqli_real_escape_string($conn, $min);
      $meridiun = mysqli_real_escape_string($conn, $meridiun);
      $department = mysqli_real_escape_string($conn, $department);
      $sql = "SELECT COUNT(*) AS count FROM calender WHERE dd = '$dd' AND  mm = '$mm' AND  yyyy = '$yyyy' AND hh = '$hh' AND min = '$min' AND meridiun = '$meridiun' AND department = '$department'";
      $result = mysqli_query($conn, $sql);
  
      if ($result) {
          $row = mysqli_fetch_assoc($result);
          return $row['count'] > 0;
      } else {
          return false;
      }
    }
    function createCal($Cal){
      $con = dbConnection();
      $sid = mysqli_real_escape_string($con, $Cal['sid']);
      $hh = mysqli_real_escape_string($con,$Cal['hh']);
      $min = mysqli_real_escape_string($con,$Cal['min']);
      $meridiun = mysqli_real_escape_string($con,$Cal['meridiun']);
      $schedule = mysqli_real_escape_string($con,$Cal['schedule']);
      $hh = mysqli_real_escape_string($con,$Cal['hh']);
      $min = mysqli_real_escape_string($con,$Cal['min']);
      $meridiun= mysqli_real_escape_string($con,$Cal['meridiun']);
      $department = mysqli_real_escape_string($con,$Cal['department']);
     
     
      $sql = "INSERT INTO calender (sid,hh, min, meridiun, schedule, hh,min,meridiun, department ) 
              VALUES ('$sid','$hh', '$min', '$meridiun', '$schedule', '$hh','$min','$meridiun', '$department')";       
  
      if(mysqli_query($con, $sql)){
          return true;
      }else{
          return false;
      }
  }
  function scdl($sid){
    $con = dbConnection();
    $sql = "select * from calender where sid='{$sid}'";
    $result = mysqli_query($con, $sql);
    $schedule = [];

    while($row = mysqli_fetch_assoc($result)){
        array_push($schedule, $row);
    }

    return $schedule;
}
function upCal($Cal,$sid) {
  $con = dbConnection();
  $sql = "UPDATE calender SET ";
  $update_fields = array();
  if (!empty($Cal['hh']) && !empty($Cal['min']) && !empty($Cal['meridiun'])) {
    $update_fields[] = "hh='" . mysqli_real_escape_string($con, $Cal['hh']) . "', 
                        min='" . mysqli_real_escape_string($con, $Cal['min']) . "', 
                        meridiun='" . mysqli_real_escape_string($con, $Cal['meridiun']) . "'";
}
  if (!empty($Cal['schedule'])) {
      $update_fields[] = "schedule='" . mysqli_real_escape_string($con, $Cal['schedule']) . "'";
  }
  if (!empty($Cal['hh']) && !empty($Cal['min']) && !empty($Cal['meridiun'])) {
    $update_fields[] = "hh='" . mysqli_real_escape_string($con, $Cal['hh']) . "', 
                        min='" . mysqli_real_escape_string($con, $Cal['min']) . "', 
                        meridiun='" . mysqli_real_escape_string($con, $Cal['meridiun']) . "'";
}
  if (!empty($Cal['department'])) {
      $update_fields[] = "department='" . mysqli_real_escape_string($con, $Cal['department']) . "'";
  }
  
  $sql .= implode(", ", $update_fields);
  $sql .= " WHERE sid='" . mysqli_real_escape_string($con, $sid) . "'";
  $result = mysqli_query($con, $sql);
  if ($result) {
      return true;
  } else {
      return false;
  }}
  function deleteCal($sid){
    $con = dbConnection();
    $sql = "delete from calender where sid='{$sid}'";
    $result = mysqli_query($con, $sql);
    if(mysqli_query($con, $sql)){
        return true;
    }else{
        return false;
    }
}
    ?>