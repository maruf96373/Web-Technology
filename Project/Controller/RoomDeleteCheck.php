<?php
require_once('../Model/crudadmin.php');
$roomId=$_REQUEST ['roomId'];
if (empty($roomId)) {
    echo "Error: Room id is empty.";
     

}
else{
    
$status=Delete($roomId);
        if($status){
            
        header('location:../View/roomView.php');
        }else{
            echo"DB error!";
        }
    }

?>
