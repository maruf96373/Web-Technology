<?php
session_start();



if(!isset($_COOKIE['flag'])){
    header('location: login.php');
}
require_once('../Model/facilityadmin.php');


$facility=viewFacility();
$_SESSION['facility'] = $facility;

    ?>

<html>
<head>
    <title> View Room</title>
    <link rel="stylesheet" href="../Assets/Admin.css"/>
</head>
<body id="b8">
<fieldset id="b9">
<img src="../Assets/logo.png" id="logo-image">
    <h3 id="b1"><u>Click&Stay</u></h3>
    <h4 id="b10">Find your next stay</h4>
     <a id="b4" href="FacilityAdmin.php">Back</a>
         <a id="b11"href="AdminHome.php">Home</a>
</fieldset>
   


<div class="facility-container">
<?php for($i=0; $i<count($facility); $i++){?>
<div class="facility-item"style="text-align: left;">
<img src="<?php echo $facility[$i]['proPic'] ?>"  id="facility-picture">
            Facility Id:<?php echo $facility[$i]['facilityId']; ?><br>
                Name:<?php echo $facility[$i]['facilityName']; ?><br>
                 <?php echo$facility[$i]['facilityDescription'] ?><br>
                Catagory:<?php echo $facility[$i]['facilityCatagory']; ?><br>
                Price:<?php echo $facility[$i]['Fprice']; ?> tk<br>
                
                
                <p><b><a  href="facilityEdit.php?facilityId=<?=$facility[$i]['facilityId']?>">Edit</a><span style="padding:7px">
                <a href="facilityDelete.php?facilityId=<?=$facility[$i]['facilityId']?>"> Delete </a></span ></b></p>
               </div>
    <?php } ?>
</div>
        </body>
        </html>
        