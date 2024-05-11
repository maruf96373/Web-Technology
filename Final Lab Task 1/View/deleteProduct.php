<?php
    require_once('../model/userModel.php');
    if(!isset($_COOKIE['flag'])){
        header('location: login.php');
    }

    $id =  $_REQUEST['pID'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Delete Product</title>
</head>
<body>
    <fieldset>
    <legend><b>Delete Product</b></legend>
    <form method="post" action="../controller/deleteproductCheck.php" enctype="">
        Product ID:<input type="text" name="pID" value ="<?php echo $id; ?>"/><br><br><br>
        Are you sure to delete this product <br>
            <input type="radio" name="radio" value="Yes" />Yes
            <input type="radio" name="radio" value="No" />No <br><br>
        <input type="submit" name="submit" value="Submit" />
    </fieldset>
    </form>
</body>
</html>
