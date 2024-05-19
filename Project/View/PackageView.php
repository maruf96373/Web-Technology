<?php
session_start();
if (!isset($_COOKIE['flag'])) {
    header('location: login.php');
    exit;
}

require_once('../Model/packageadmin.php');

$packages = viewPackage();

$_SESSION['packages'] = $packages;
?>

<html>
<head>
    <title>View Packages</title>
    <link rel="stylesheet" href="../Assets/Admin.css"/>
</head>
<body id="b8">

<fieldset id="b9">
    <img src="../Assets/logo.png" id="logo-image">
    <h3 id="b1"><u>Click & Stay</u></h3>
    <h4 id="b10">Find your next stay</h4>
    <a id="b4" href="PackageAdmin.php">Back</a>
    <a id="b11" href="AdminHome.php">Home</a>
</fieldset>

<div class="package-container">
    <?php foreach ($packages as $package) { ?>
        <div class="package-item" style="text-align: left;">
            <img src="<?php echo $package['proPic'] ?>"  id="package-picture"><br>
            Package ID: <?php echo $package['packageId']; ?><br>
            Name: <?php echo $package['packageName']; ?><br>
            Description: <?php echo $package['packageDescription']; ?><br>
            Catagory: <?php echo $package['packageCatagory']; ?><br>
            Price: <?php echo $package['packagePrice']; ?> tk<br>
            <b><a href="packageEdit.php?packageId=<?php echo $package['packageId']; ?>">Edit</a></b>
            <b><a href="packageDelete.php?packageId=<?php echo $package['packageId']; ?>">Delete</a></b>
        </div>
    <?php } ?>
</div>

</body>
</html>
