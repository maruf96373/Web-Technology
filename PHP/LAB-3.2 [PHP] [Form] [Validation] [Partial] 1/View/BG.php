<html>
<head>
    <title>Blood Group</title>
</head>
<body>
    <form method="post" action="../Controller/BGCheck.php" enctype="">
        <Table>
            <tr align="left">
        <fieldset style="width: 300;">
        <legend><b>BLOOD GROUP</b></legend>
        <select name="BG">
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
            </select> 
           <hr>
           <div style="padding: 3px;"> <input type="submit" name="submit" value="Submit"/></div>
        </fieldset>
        </tr>
    </Table>
    </form>
</body>
</html>