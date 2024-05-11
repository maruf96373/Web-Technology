<?php
    require_once('../model/userModel.php');

    if(!isset($_COOKIE['flag'])){
        header('location: signin.php');
    }
    
    $users = getAllProduct();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Product list</title>
</head>
<body>
        <h1>Product List</h1>
        <table border=1>
            <tr>
                <td>ID</td>
                <td>PRODUCT NAME</td>
                <td>QUANTITY</td>
                <td>PRICE</td>
                <td>ACTION</td>
            </tr>
            <?php for($i=0; $i<count($users); $i++){?>
            <tr>
                <td><?php echo $users[$i]['pID']; ?></td>
                <td><?php echo $users[$i]['Name']; ?></td>
                <td><?php echo $users[$i]['Quantity']; ?></td>
                <td><?=$users[$i]['Price'] ?></td>
                <td>
                    <a href="editProduct.php?pID=<?=$users[$i]['pID']?>"> Edit </a> |
                    <a href="deleteProduct.php?pID=<?=$users[$i]['pID']?>"> Delete </a> 
                </td>
            </tr>
            <?php } ?>
        </table>
</body>
</html>