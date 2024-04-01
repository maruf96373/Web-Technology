<html>
<head>
    <title>GENDER</title>
</head>
<body>
    <form method="post" action="../Controller/GenderCheck.php" enctype="">
        <Table>
            <tr align="left">
        <fieldset style="width: 300;">
        <legend><b>GENDER</b></legend>
             <input type="radio" name="gender" value="male" />Male
            <input type="radio" name="gender" value="female" />Female
            <input type="radio" name="gender" value="other" />Other 
           <hr>
           <div style="padding: 3px;"> <input type="submit" name="submit" value="Submit"/></div>
        </fieldset>
        </tr>
    </Table>
    </form>
</body>
</html>