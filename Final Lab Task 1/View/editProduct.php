<?php 
require_once('../model/userModel.php');
if(!isset($_COOKIE['flag'])){
    header('location: login.php');
}
$id =  $_REQUEST['pID'];

$status= getProduct($id);
$pname=  $status[0]['Name'];
$quntity=  $status[0]['Quantity'];
$price=  $status[0]['Price'];



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Product</title>
</head>
<body>
    <fieldset>
    <legend><b>Update Product</b></legend>
    <form method="post" action="../controller/editproductCheck.php" enctype="">
        Product ID:<input type="text" name="pID" value ="<?php echo $id; ?>" /><br><br><br>
        Product Name:<input type="text" name="name" value="<?php echo $pname; ?>" required><br><br>
        Product Quantity:<input type="number" name="quantity" min="0" value="<?php echo $quntity; ?>" required><br><br>
        Price:<input type="number" name="price" min="0" value="<?php echo $price; ?>" required><br><br>
        <input type="submit" name="submit" value="Submit" />
    </fieldset>
</body>
</html>