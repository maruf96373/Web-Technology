<?php 

    $host = "localhost";
    $dbname = "Employee";
    $dbuser = "root";
    $dbpass = "";

    function dbConnection(){
        global $host;
        global $dbuser;
        global  $dbname ;
        global $dbpass;


        $con = mysqli_connect($host, $dbuser,$dbpass , $dbname);
        return $con;
    }

?>