<?php
require_once('../Model/Schedledb.php');
$sid=$_REQUEST['sid'];
$dd = $_REQUEST['dd'];
$mm = $_REQUEST['mm'];
$yyyy = $_REQUEST['yyyy'];
$schedule = $_REQUEST['schedule'];
$hh = $_REQUEST['hh'];
$min = $_REQUEST['min'];
$meridiun = $_REQUEST['meridiun'];
$department = $_REQUEST['department'];

function IdCheck($sid) {
    if (empty($sid)) {
        return "Guest ID cannot be empty";
    }


    if (strlen($sid) !== 6) {
        echo "Invalid Guest ID format. It must be 6 characters long";
        return false;
    }
    $numericPart = substr($sid, 0);
    if (!ctype_digit($numericPart)) {
        echo "Invalid Guest ID format. it must contain only digits";
        return false;
    }

    return true;
}
function DateCheck($dd,$mm,$yyyy){
    if (empty($dd) || empty($mm) || empty($yyyy)) {
        echo "Date is invalid: Please fill in all fields.";
      } else {
        if (!is_numeric($dd) || !is_numeric($mm) || !is_numeric($yyyy)) {
          echo "Date is invalid: Please enter numbers for day, month, and year.";
          return false;
        } else {
          $dd = intval($dd);
          $mm = intval($mm);
          $yyyy = intval($yyyy);

$currentDate = date('Y-m-d');
$inputDate = "$yyyy-$mm-$dd"; 
if (($dd < 1 || $dd > 31 || $mm < 1 || $mm > 12) || (strtotime($inputDate) < strtotime($currentDate))) {
    echo "Date is invalid: Either values are outside the allowed ranges or it's a previous date.";
    return false;
}
 else {
            $maxDays = 31;
            if ($mm == 4 || $mm == 6 || $mm == 9 || $mm == 11) {
              $maxDays = 30;
            } else if ($mm == 2) {
              $maxDays = 28;
              if ($yyyy % 4 == 0 && ($yyyy % 100 != 0 || $yyyy % 400 == 0)) {
                $maxDays = 29;
              }
            }
      
            if ($dd > $maxDays) {
              echo "Date is invalid: Day is not valid for the selected month.";
            } else {
              return true;
            }
          }
        }
      }

}
function timeCheck($hh, $min, $meridiun) {
  $hours = (int)$hh;
  $minutes = (int)$min;
  if (($hours < 1 || $hours > 12) || ($minutes < 0 || $minutes > 59)) {
      return false;
  }
  if ($meridiun !== 'AM' && $meridiun !== 'PM') {
      return false;
  }

  return true;
}

function depCheck($department) {
    $validDepartments = array("housekeeping", "food", "human resource", "accounting", "security","all");
    $department = strtolower($department);
    if (empty($department) || !in_array($department, $validDepartments)) {
        return false; 
    }

    return true; 
  }
  function meeting($hh,$min,$meridiun,  $department, $dd,$mm,$yyyy){
$status=meetingExist($hh,$min,$meridiun,  $department,$dd,$mm,$yyyy);
if($status){
  echo"You already fixed a meeting in same date & time with this department";
  return false;
}else{
  return true;
}

  }
if($sid==""||$dd==""||$mm==""||$yyyy==""||$schedule==""||$hh==""||$min==""||$meridiun==""||$department==""){
echo"some field are null";
}else {
  if(IdCheck($sid)&&DateCheck($dd,$mm,$yyyy)&&timeCheck($hh,$min,$meridiun)&&depCheck($department)&&meeting($hh,$min,$meridiun,  $department, $dd,$mm,$yyyy)){
  $Cal = ['dd'=>$dd ,'mm'=>$mm,'yyyy'=>$yyyy,'schedule'=>$schedule,'hh'=>$hh,'min'=>$min,'meridiun'=>$meridiun,'department'=> $department];
  $status = upCal($Cal,$sid);
  if($status){
      header('location: ../View/CalenderAdmin.php');
  }
else{
  echo"db Connection error";
}}}
?>