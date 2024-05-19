<?php
require_once('../Model/packageadmin.php');

$packageId = isset($_REQUEST['packageId']) ? $_REQUEST['packageId'] : '';
    $package = getpackage($packageId);
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

<form method="post" action="logOut.php" enctype="">         
  
 
    
<div class="package-container">
<?php for($i=0; $i<count($package); $i++){?>
<div class="package-item" style="text-align: left;">
<img src="<?php echo $package[$i]['proPic'] ?>"  id="package-picture">
           Facility Id:<?php echo $package[$i]['packageId']; ?><br>
               Name:<?php echo $package[$i]['packageName']; ?><br>
                <?=$package[$i]['packageDescription'] ?><br>
               Category:<?php echo $package[$i]['packageCatagory']; ?><br>
               Price:<?php echo $package[$i]['packagePrice']; ?> tk<br>
            
            <?php } ?>
           
</form>

        </body>
        </html>
        