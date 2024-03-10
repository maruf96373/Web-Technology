<html>
    <head>
        <title>Registration</title>
    </head>
<body>
    
<table border="1" cellspacing="0" width="550">
        <tr>
            <td><table><tr><td width="500">xCompany</td><td align=right>  
            <a style="color:rgb(0, 102, 255); " href="Login.php">Login</a>
</td></tr></table></td>
        </tr>
        <tr  style="height:600; width: 700;">
            <td align="center">
            <form method="post" action="../Controller/RegCheck.php" enctype="">
        <fieldset style="width: 400;">
           <legend><b>REGISTRATION</b></legend>
            <table>
                <tr>
                <td align="left">Name </td><td><span style="padding: 3px;">:<input type="text" name="text" value=""></span></td>
</tr>
<tr><td colspan=2><hr></td></tr>
            <td align="left">Email </td><td><span style="padding: 3px;">:<input type="email" name="email" value=""></span></td>
</tr>
<tr><td colspan=2><hr></td></tr>
<td align="left">User Name </td><td><span style="padding: 3px;">:<input type="text" name="text" value=""></span></td>
</tr>
<tr><td colspan=2><hr></td></tr>
<tr>
<td align="left"> Password</td><td> <span style="padding: 3px;">:<input type="password" name="password" value=""/></span></td>
</tr>
<tr><td colspan=2><hr></td></tr>
<td align="left">Confirm Password</td><td> <span style="padding: 3px;">:<input type="password" name="password" value=""/></span></td>
</tr>
<tr><td colspan=2><hr></td></tr>
<tr><td colspan=2><form method="" action="" enctype="">
        <fieldset style="width: 350;">
            <legend>Gender</legend>
            <table>
            <td><input type="radio" name="gender" value="Male" />Male
                <input type="radio" name="gender" value="Female" />Female
                <input type="radio" name="gender" value="Other" />Other </td>
                <td><div style="padding: 10;"></div></td>
</table>
</fieldset>
</form></td></tr>
<tr><td colspan=2><hr></td></tr>
<tr><td colspan=2><form method="" action="" enctype="">
        <fieldset style="width: 350;">
            <legend>Date Of Birth</legend>
            <table>
            <td> <div style="padding:4px;"><input type="text"size="2px" name="dd" value=""><b> /</b> <input type="text"size="2px" name="mm" value=""><b> /</b> <input type="text"size="2px" name="yyyy" value=""><i>(dd/mm/yyyy)</i></td>
           </div>
           <td><div style="padding: 10;"></div></td>
</table>
</fieldset>
</form></td></tr>
<tr><td colspan=2><hr></td></tr>
<tr><td colspan=2><input type="submit" name="Submit" value="Submit"/>
                 
<input type="button" name="reset" value="Reset"/></td>
        </table>
        </fieldset>
        </form>
                </td>
                </tr>
                
                <tr>
                    <td align=center>Copyright © 2017
</td>
</tr>
                </table>
                
</body>
</html>