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
    <title>Facilities Form</title>
    <link rel="stylesheet" href="../Assets/customerStyle.css"/>
</head>
<body id="b8">
<fieldset id="b9">
<img src="../Assets/logo.png" id="logo-image">
    <h3 id="b1"><u>Click&Stay</u></h3>
    <h4 id="b10">Find your next stay</h4>
    <a id="b4" href="home.php">home</a>
    <a id="b11" href="PackageViewCustomer.php">Next</a>
</fieldset>
<div class="facility-container">
<?php for($i=0; $i<count($facility); $i++){?>
<div class="facility-item" style="text-align: left;">
<img src="<?php echo $facility[$i]['proPic'] ?>"  id="facility-picture">
           Facility Id:<?php echo $facility[$i]['facilityId']; ?><br>
               Name:<?php echo $facility[$i]['facilityName']; ?><br>
                <?=$facility[$i]['facilityDescription'] ?><br>
               Catagory:<?php echo $facility[$i]['facilityCatagory']; ?><br>
               Price:<?php echo $facility[$i]['Fprice']; ?> tk<br>
                
                
               <p> <a id="b12" onclick="validateEdit()" href="SelectedFacilities.php?facilityId=<?=$facility[$i]['facilityId']?>"> Select </a></p>
               </div>
    <?php } ?>
</div>
       

        <script>

function validateEdit(){
    
    
       alert ( "are u sure u want to select this facility?");
}

</script>


</body>
        </html>
   

