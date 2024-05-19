<?php
require_once('../Model/facilityadmin.php');

$facilityId = isset($_REQUEST['facilityId']) ? $_REQUEST['facilityId'] : '';
    $facility = getfacility($facilityId);
    if(!isset($_COOKIE['flag'])){
        header('location: login.php');
    }


?>

<html>
<head>
    <title>Room Management Form</title>
    <link rel="stylesheet" href="../Assets/customerStyle.css"/>
</head>
<body  id="b8"> 
<fieldset id="b9">
<img src="../Assets/logo.png" id="logo-image">
    <h3 id="b1"><u>Click&Stay</u></h3>
    
    <h4 id="b10">Find your next stay</h4>
   
    <a id="b11" href="home.php">home</a>
</fieldset>

<form method="post" action="PackageViewCustomer.php" enctype="">         
  
 
    
    <div class="facility-container">
<?php for($i=0; $i<count($facility); $i++){?>
<div class="facility-item"style="text-align: left;">
<img src="<?php echo $facility[$i]['proPic'] ?>"  id="facility-picture"><br>
            Facility Id:<?php echo $facility[$i]['facilityId']; ?><br>
                Name:<?php echo $facility[$i]['facilityName']; ?><br>
                 <?=$facility[$i]['facilityDescription'] ?><br>
                Catagory:<?php echo $facility[$i]['facilityCatagory']; ?><br>
                Price:<?php echo $facility[$i]['Fprice']; ?> tk<br>
               
               
            
            <?php } ?>
            </div>
</form>

        </body>
        </html>
        