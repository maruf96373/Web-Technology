
<html>
    <head>
        <title>Profile</title>
    </head>
<body>
<table border="1" cellspacing="0" width="750">

        <tr>
            <td colspan=2><table><tr><td width="334">Online Shop</td><td align=right>  Logged in as Admin
</td></tr></table></td>
        </tr>

        <tr  style="height:200;">
            <td align="Left" style="width:200">
        <b>Account</b><hr>
 
                    <span align="left">
                        <ul>
                        <li><a href="emp.php">View Employee</a></li>
                            <li><a href="Addemp.php">Add Employee</a></li>
                            <li><a href="Updateemp.php">Update Employee</a></li>
                            <li><a href="Deleteemp.php">Delete Employee</a></li>
                        </ul>
</span>
     
                </td><td align=top width="400"><span align=top>
                <form method="post" action="../Controller/AddempCheck.php" enctype="">
                    <fieldset width="200">
                        <legend>Add Employee</legend>
                        <table>
                            <tr>
                            <td>Name</td> <td>:<input type="text" name="name" value=""></td>
                            </tr>
                            <tr>
                            <td>Contact No.</td> <td>:<input type="text" name="contact" value=""></td>
                            </tr>
                            <tr>
                            <td>UserName</td> <td>:<input type="text" name="uname" value=""></td>
                            </tr>
                            <tr>
                            <td>Password</td> <td>:<input type="password" name="password" value=""></td>
                            </tr>
                <tr>
                    <td>
                    <input type="submit" name="Submit" value="Add"/>
</td>
</tr>
                            </fieldset>
               </form>

</table>
           
               
</body>
</html>