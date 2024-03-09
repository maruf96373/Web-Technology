<html>
<head>
    <title>DOB</title>
</head>
<body>
    <form method="post" action="../Controller/DOBCheck.php" enctype="">
        <fieldset style="width: 300;">
        <legend><b>DATE OF BIRTH</b></legend>
        <table>
                <tr>
                    <td>
                        <div style="padding:3px; ">
                            dd <br>
                            <input type="text" name="dd" value="" style="width: 30px;" /> <b>/</b>
                        </div>
                    </td>
                   <td>
                        <div style="padding:3px;">
                            mm <br>
                            <input type="text" name="mm" value="" style="width: 30px;" /> <b>/</b>
                        </div>
                    </td>
                   <td>
                        <div style="padding:3px;">
                            yyyy <br>
                            <input type="text" name="yyyy" value="" style="width: 50px;" /> 
                        </div>
                    </td>
                </tr>
            </table>
           <hr>
           <div style="padding: 3px;"> <input type="submit" name="submit" value="Submit"/></div>
        </fieldset>
    </form>
</body>
</html>