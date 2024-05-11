<?php
    if(!isset($_COOKIE['flag'])){
        header('location: login.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Search Epmloyee</title>
</head>
<body>
    <fieldset>
    <legend><b>Search Employee</b></legend>
    <form method="post" action="displayEmployee.php" enctype="">
        Name:<input type="text" name="name" value=""/><br><br>
        Username:<input type="text" name="uname" value=""/><br><br>
        ID:<input type="number" name="id" min="0" value=""/><br><br>

        <input type="submit" value="Search">
    </form>
    </fieldset>
</body>
</html>
