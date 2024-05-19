<?php
if(!isset($_COOKIE['flag'])){
    header('location: login.php');
}
$packageId = isset($_REQUEST['packageId']) ? $_REQUEST['packageId'] : '';
?>
<html>
<head>
    <title>Room Management Form</title>
    <link rel="stylesheet" href="../Assets/Admin.css"/>
</head>
<body id="b8">
<fieldset id="b9">
<img src="../Assets/logo.png" id="logo-image">
    <h3 id="b1"><u>Click&Stay<u></h3>
    
    <h4 id="b10">Find your next stay</h4>
  
    <a id="b4" href="PackageView.php">Back</a>
 
</fieldset>
   
   
<form method="post" action="../Controller/PackageDeleteCheck.php" enctype="">
            
                
                <table align="center"  cellspacing="0" class="c4" >
               
                    <tr class="c3">
                        <td>Package Id:</td>
                        <td>
                            
                                <input type="text" name="packageId"value="<?= $packageId ?>"/>
                           
                            </td>
                           
                      </tr>
                        <tr class="c3">
                        <td colspan="2" style="text-align: center;">
                        <div style="padding: 3px;">
                            <button type="submit"id="b7" name="delete" value="delete" onclick="validateEdit()">Delete</button>
                           
                             </div>
                             </td>
</tr>
                          
                </table> 
                
        </form>
    </div>
    <script>

function validateEdit(){
    
    
       alert ( "are u sure u want to delete it?");
}

</script>
</body>
</html>
