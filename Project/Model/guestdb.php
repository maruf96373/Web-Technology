<?php 
    require_once('db.php');

    function login($username, $password){
        $con = dbConnection();
        $sql = "select * from guest where username='{$username}' and password='{$password}'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        if($count == 1){
            return true;
        }else{
            return false;
        }
    }
    function updateGuestPic($user, $target_file) {

        $con = dbConnection();
        $sql = "UPDATE guest SET proPic = '$target_file' WHERE username = '$user'";
    
        if (mysqli_query($con, $sql)) {
            return true;
        } else {
            return false;
        }
    }
    function UpdateId($username, $gid) {
        $con = dbConnection();
        $sql = "UPDATE guest SET gid = '$gid' WHERE username = '$username'";
        
        if (mysqli_query($con, $sql)) {
            return true;
        } else {
            return false;
        }
    }
    
    function upPass($user, $npassword) {

        $con = dbConnection();
        $sql = "UPDATE guest SET password = '$npassword' WHERE username = '$user'";
    
        if (mysqli_query($con, $sql)) {
            return true;
        } else {
            return false;
        }
    }
    
    function name($user){
        $con = dbConnection();
        $sql = "select * from guest where username='{$user}'";
        $result = mysqli_query($con, $sql);
        $guest = [];

        while($row = mysqli_fetch_assoc($result)){
            array_push($guest, $row);
        }

        return $guest;
    }
    function nul(){
        $con = dbConnection();
        $sql = "select * from guest where gid is null";
        $result = mysqli_query($con, $sql);
        $guest = [];

        while($row = mysqli_fetch_assoc($result)){
            array_push($guest, $row);
        }

        return $guest;
    }
    function getAllGuest(){
        $con = dbConnection();
        $sql = "select * from guest";
        $result = mysqli_query($con, $sql);
        $guest = [];

        while($row = mysqli_fetch_assoc($result)){
            array_push($guest, $row);
        }

        return $guest;
    }
    function uniuser($username) {
        $conn = dbConnection();
        $sql = "SELECT COUNT(*) FROM guest WHERE username = '$username'";
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
    function uniemail($email){
        $conn=dbconnection();
        $sql = "SELECT COUNT(*) FROM guest WHERE email = '$email'";
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
    function uniId($gid) {
        $conn=dbconnection();
        $sql = "SELECT COUNT(*) FROM guest WHERE gid = '$gid'";
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
    
    
    
    
    
    function spass($user){
        $con = dbConnection();
        $sql = "select password from guest where username='{$user}'";
        $result = mysqli_query($con, $sql);
        $user = [];

        while($row = mysqli_fetch_assoc($result)){
            array_push($user, $row);
        }

        return $user;
    }
    function retrive($email){
        $con = dbConnection();
        $sql = "select password from guest where email='{$email}'";
        $result = mysqli_query($con, $sql);
        $email = [];

        while($row = mysqli_fetch_assoc($result)){
            array_push($email, $row);
        }

        return $email;
    }
    function createGuest($guest){
        $con = dbConnection();
        $name = mysqli_real_escape_string($con, $guest['name']);
        $email = mysqli_real_escape_string($con, $guest['email']);
        $gender = mysqli_real_escape_string($con, $guest['gender']);
        $username = mysqli_real_escape_string($con, $guest['username']);
        $password = mysqli_real_escape_string($con, $guest['password']);
        $dd = mysqli_real_escape_string($con, $guest['dd']);
        $mm = mysqli_real_escape_string($con, $guest['mm']);
        $yyyy = mysqli_real_escape_string($con, $guest['yyyy']);
        $sql = "INSERT INTO guest (name, email, gender, username, password, dd, mm, yyyy) 
                VALUES ('$name', '$email', '$gender', '$username', '$password', '$dd', '$mm', '$yyyy')";       
    
        if(mysqli_query($con, $sql)){
            return true;
        }else{
            return false;
        }
    }
    

    function deleteGuest($username){
        $con = dbConnection();
        $sql = "delete from guest where username='{$username}'";
        $result = mysqli_query($con, $sql);
        if(mysqli_query($con, $sql)){
            return true;
        }else{
            return false;
        }
    }

    function updateGuest($guest, $user) {
        $con = dbConnection();
        $sql = "UPDATE guest SET ";
        $update_fields = array();
    
        if (!empty($guest['name'])) {
            $update_fields[] = "name='" . mysqli_real_escape_string($con, $guest['name']) . "'";
        }
        if (!empty($guest['email'])) {
            $update_fields[] = "email='" . mysqli_real_escape_string($con, $guest['email']) . "'";
        }
        if (!empty($guest['gender'])) {
            $update_fields[] = "gender='" . mysqli_real_escape_string($con, $guest['gender']) . "'";
        }
        if (!empty($guest['dd']) && !empty($guest['mm']) && !empty($guest['yyyy'])) {
            $update_fields[] = "dd='" . mysqli_real_escape_string($con, $guest['dd']) . "', 
                                mm='" . mysqli_real_escape_string($con, $guest['mm']) . "', 
                                yyyy='" . mysqli_real_escape_string($con, $guest['yyyy']) . "'";
        }
        $sql .= implode(", ", $update_fields);
        $sql .= " WHERE username='" . mysqli_real_escape_string($con, $user) . "'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    

?>