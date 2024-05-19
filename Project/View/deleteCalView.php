<?php
require_once('../Model/guestdb.php');

if(!isset($_COOKIE['flag'])){
    header('location: login.php');
}
$schedule=$_REQUEST['sid'];
?>
<html>
    <head>
        <title>Update View</title>
        <link rel="stylesheet" href="../Assets/Admin.css"/>
    </head>
<body id="b8">
 <fieldset id="b9">
    <img src="../Assets/logo.png" id="logo-image">
    
    <h3 id="b1"><u>Click & Stay</u></h3>
    
    <h4 id="b10">Find your next stay</h4>
    <a id="b11" href="CalenderAdmin.php">back</a>
    
      
</fieldset>
                <form method="post" action="../Controller/DeleteCalCheck.php" enctype="">
                        <table align="center">
                <tr class="c3">
                <td>Schedule ID </td>    <td> :<input type="text" name="sid" value="<?php echo $schedule ?>"></td>  
</tr><tr><input type="submit" name="Submit" id="b7" value="Delete"/>
</tr>
               <tr><td> </td></tr>

               </form>

</table>
           
               
</body>
</html>