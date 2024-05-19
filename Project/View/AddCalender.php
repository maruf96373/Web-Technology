<?php
if(!isset($_COOKIE['flag'])){
    header('location: login.php');
}
?>
<html>
    <head>
        <title>Profile</title>
        <link rel="stylesheet" href="../Assets/Admin.css"/>
    </head>
<body id="b8">
 <fieldset id="b9">
    <img src="../Assets/logo.png" id="logo-image">
    
    <h3 id="b1"><u>Click & Stay</u></h3>
    
    <h4 id="b10">Find your next stay</h4>
    <a id="b11" href="CalenderAdmin.php">Schedule</a>
    <a id="b4" href="AdminHome.php">Back</a>
    
      
</fieldset>
 
                <p></p>
                <form method="post" action="../Controller/AddCalCheck.php" enctype="">
              
                    
                        <table class="c1" align="center">
                            <tr class="c1">
                            <td>Schedule Id</td> <td>:<input type="number" id="sid" name="sid" value="" onkeyup="IdCheck()"></td>
                            </tr>
                            <tr class="c1">
                            <td>Schedule Date</td> <td>
                  <div style="padding: 4px;">
                    <input type="text" id="dd" size="2px" name="dd" value="" onkeyup="dob()"><b> /</b>
                    <input type="text" id="mm" size="2px" name="mm" value="" onkeyup="dob()"><b> /</b>
                    <input type="text" id="yyyy" size="2px" name="yyyy" value="" onkeyup="dob()">
                    <i>(dd/mm/yyyy)</i>
                  </div>
                </td>
                </tr>
                <tr class="c1">
                <td>Schedule Details</td> <td>:<input type="text" id="schedule" name="schedule" value="" ></td>
                </tr>
                <tr>
                            <td>Schedule Time</td> <td>
                  <div style="padding: 4px;">
                    <input type="text" id="hh" size="2px" name="hh" value="" onkeyup="checkTime()"><b> :</b>
                    <input type="text" id="min" size="2px" name="min" value="" onkeyup="checkTime()">
                    <select name="meridiun" id="meridiun" onkeyup="checkTime()">
        <option value="AM">AM</option>
        <option value="PM">PM</option>
    </select>
                    <i>(hh/min)</i>
                  </div>
                </td>
                </tr>
                <tr class="c1">
                <td>Department</td> <td>:<input type="text" id="dept" name="department" value="" onkeyup="depCheck()"></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                    <input type="submit" name="Submit" id="b7" value="Add"/>
</td>
</tr>
                           
               </form>

</table>
  <script src="../Assets/calender.js"></script>         
               
</body>
</html>