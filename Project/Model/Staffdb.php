<?php 
    require_once('db.php');
    
    function Slogin($username, $password){
        $con = dbConnection();
        $username = mysqli_real_escape_string($con, $username);
$password = mysqli_real_escape_string($con, $password);
        $sql = "select * from staff where sid='{$username}' and password='{$password}'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        if($count == 1){
            return true;
        }else{
            return false;
        }
    }
    ?>