<?php

if(!isset($_COOKIE['flag'])){
    header('location: login.php');
}

require_once('../Model/staffadmin.php');

$staffId = isset($_REQUEST['staffId']) ? $_REQUEST['staffId'] : '';
$staff=SearchStaff($staffId);
    



    ?>

<html>
<head>
    <title> View Room</title>
    

<link rel="stylesheet" href="../Assets/Admin.css"/>
</head>
<body id="b8">

<fieldset id="b9">
<img src="../Assets/logo.png" id="logo-image">
    <h3 id="b1"><u>Click & Stay</u></h3>
    <h4 id="b10">Find your next stay</h4>
      <a id="b4" href="StaffAdmin.php">Back</a>
        <a id="b11" href="StaffView.php">Next</a>
        
</fieldset>

    
            
                
              
               <div class="room-container">

               <?php for($i=0; $i<count($staff); $i++){?>
                    <div class="room-item"style="text-align: left;">
                   <img src="<?php echo $staff[$i]['proPic'] ?>"id="room-picture">
    Id:<?php echo $staff[$i]['staffId']; ?><br>
   Name:<?php echo $staff[$i]['staffName'];?><br>
    Email:<?php echo $staff[$i]['email']; ?><br>
   Department:<?php echo $staff[$i]['department']; ?><br>
   Contact:<?php echo $staff[$i]['contact']; ?><br>
   Salary:<?php echo $staff[$i]['salary']; ?><br>
    Status:<?php echo $staff[$i]['accountStatus']; ?><br>
    
    </div>
    <?php } ?>
</div>
       
        
        </body>
        </html>