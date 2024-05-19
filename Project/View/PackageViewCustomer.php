<?php
session_start();
if(!isset($_COOKIE['flag'])){
    header('location: login.php');
}
require_once('../Model/packageadmin.php');
$packages=viewPackage();
$_SESSION['packages'] = $packages;




    

   

    ?>

<html>
<head>
    <title> View Room</title>
    <link rel="stylesheet" href="../Assets/customerStyle.css"/>
</head>
<body id="b8">
<fieldset id="b9">
    <img src="../Assets/logo.png" id="logo-image">
    <h3 id="b1"><u>Click & Stay</u></h3>
    <h4 id="b10">Find your next stay</h4>
 
</fieldset>

<div class="package-container">
    <?php foreach ($packages as $package) { ?>
        <div class="package-item" style="text-align: left;">
            <img src="<?php echo $package['proPic'] ?>" id="package-picture"><br>
            Package ID: <?php echo $package['packageId']; ?><br>
            Name: <?php echo $package['packageName']; ?><br>
            Description: <?php echo $package['packageDescription']; ?><br>
            Category: <?php echo $package['packageCatagory']; ?><br>
            Price: <?php echo $package['packagePrice']; ?> tk<br>
            <p><a id="b12" onclick="validateEdit()" href="SelectedPackage.php?packageId=<?php echo $package['packageId']; ?>">Select</a></p>
        </div>
    <?php } ?>
</div>

       
        <script>

function validateEdit(){
    
    
       alert ( "are u sure u want to select this package?");
}

</script>
            
        </body>
        </html>
       
   

