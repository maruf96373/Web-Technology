<?php
require_once('../Model/schedledb.php');

if(!isset($_COOKIE['flag'])){
    header('location: login.php');
}
$sid=$_REQUEST['sid'];
$schedule=scdl($sid);
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
                <p></p>
                <form method="post" action="../Controller/UpdateCalCheck.php" enctype="">
                 
                      
                        <table class="c1" align="center">
                        <?php for($i=0; $i<count($schedule); $i++){?>
                            <tr>
                            <td>Schedule Id</td> <td>:<input type="number" id="sid" name="sid" value="<?php echo $schedule[$i]['sid']; ?>" onkeyup="IdCheck()"></td>
                            </tr>
                            <tr>
                            <td>Schedule Date</td> <td>
                  <div style="padding: 4px;">
                    <input type="text" size="2px" id="dd" name="dd" value="<?php echo $schedule[$i]['dd']; ?>" onkeyup="dob()"><b> /</b>
                    <input type="text" size="2px" id="mm" name="mm" value="<?php echo $schedule[$i]['mm']; ?>" onkeyup="dob()"><b> /</b>
                    <input type="text" size="2px" id="yyyy" name="yyyy" value="<?php echo $schedule[$i]['yyyy']; ?>" onkeyup="dob()">
                    <i>(dd/mm/yyyy)</i>
                  </div>
                </td>
                </tr>
                </tr>
                <td>Schedule Details</td> <td>:<input type="text" name="schedule" value=" <?php echo $schedule[$i]['schedule']; ?>"></td>
                </tr>
                <tr>
    <td>Schedule Time</td> 
    <td>
        <div style="padding: 4px;">
            <input type="text" size="2px" id="hh" name="hh" value="<?php echo $schedule[$i]['hh']; ?>" onkeyup="checkTime()"><b> :</b>
            <input type="text" size="2px" id="min" name="min" value="<?php echo $schedule[$i]['min']; ?>"onkeyup="checkTime()">
            <select name="meridiun" id="meridiun" onkeyup="checkTime()">
    <option value="AM" <?php if ($schedule[$i]['meridiun'] == 'AM') echo 'selected'; ?>>AM</option>
    <option value="PM" <?php if ($schedule[$i]['meridiun'] == 'PM') echo 'selected'; ?>>PM</option>
</select>
            <i>(hh/min/meridiun)</i>
        </div>
    </td>
</tr>

  <tr>
                <td>Department</td> <td>:<input type="text" id="dept" name="department" value="<?php echo $schedule[$i]['department']; ?>" onkeyup="depCheck()"></td>
                </tr>
                <tr>
                    <td>
                    <td colspan="2" style="text-align: center;">
                    <input type="submit" name="Submit" id="b7" value="Update"/>
</td>
</tr>
                <?php } ?>
                        </table>
                           
               </form>
               <script src="../Assets/calender.js"></script>  
</body>
</html>