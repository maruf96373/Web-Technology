<?php
    require_once('../model/userModel.php');
    if(!isset($_COOKIE['flag'])){
        header('location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Products</title>
</head>
<body>
    <fieldset>
    <legend><b>Add Product</b></legend>
    <form method="post" action="../controller/addproductCheck.php" enctype="">
        Product Name:<input type="text" name="name" value="" required><br><br>
        Product Quantity:<input type="number" name="quantity" min="0" value="" required><br><br>
        Price:<input type="number" name="price" min="0" value="" required><br><br>
        <input type="submit" name="submit" value="Submit" />
    </fieldset>
    </form>
</body>
</html>
