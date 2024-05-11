<?php
    if(!isset($_COOKIE['flag'])){
        header('location: signin.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Demo Dashboard</title>
</head>
<body>
    <table width="100%" border="0">
        <tr>
            <td>
                <a href="addProduct.php">Add Product</a> <br><br>
                <a href="productlist.php">Product List</a><br><br>
                <a href="../controller/logout.php">Logout</a>
            </td>
        </tr>
        <tr>
            <td>
                <p>Welcome <?php echo $_COOKIE['flag']; ?></p>
            </td>
        </tr>
    </table>
</body>
</html>

