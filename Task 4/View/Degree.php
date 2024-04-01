<html>
<head>
    <title>Degree</title>
</head>
<body>
    <form method="post" action="../Controller/DegreeCheck.php" enctype="">
        <Table>
            <tr align="left">
        <fieldset style="width: 300;">
        <legend><b>DEGREE</b></legend>
        <input type="checkbox" name="check[]" value="SSC" />SSC
             <input type="checkbox" name="check[]" value="HSC" />HSC
             <input type="checkbox" name="check[]" value="BSc" />BSc 
             <input type="checkbox" name="check[]" value="MSc" />MSc 
           <hr>
           <div style="padding: 3px;"> <input type="submit" name="submit" value="Submit"/></div>
        </fieldset>
        </tr>
    </Table>
    </form>
</body>
</html>