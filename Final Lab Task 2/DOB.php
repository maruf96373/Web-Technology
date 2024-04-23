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
                            <input type="text" name="dd" id="dd" value="" style="width: 30px;" /> <b>/</b>
                        </div>
                    </td>
                   <td>
                        <div style="padding:3px;">
                            mm <br>
                            <input type="text" name="mm" id="mm" value="" style="width: 30px;" /> <b>/</b>
                        </div>
                    </td>
                   <td>
                        <div style="padding:3px;">
                            yyyy <br>
                            <input type="text" name="yyyy" id="yyyy" value="" style="width: 50px;" /> 
                        </div>
                       
                    </td>
                    
                </tr>
            </table>
            <p id="dob-validation"></p>
           <hr>
           <div style="padding: 3px;"> <input type="button" name="submit" value="Submit" onclick="validateDOB()" /></div>
        </fieldset>
    </form>
    <script>
function validateDOB() {
    let dd = document.getElementById('dd').value;
    let mm = document.getElementById('mm').value;
    let yyyy = document.getElementById('yyyy').value;
    let obj = document.getElementById('dob-validation');
    obj.innerHTML = "";

    if (dd === "" || mm === "" || yyyy === "") {
        obj.innerHTML = "*Date is invalid: Please fill in all fields.";
        obj.style.color = 'red';
        return false;
    }

    if (isNaN(dd) || isNaN(mm) || isNaN(yyyy)) {
        obj.innerHTML = "*Date is invalid: Please enter numbers for day, month, and year.";
        obj.style.color = 'red';
        return false;
    }

    dd = parseInt(dd);
    mm = parseInt(mm);
    yyyy = parseInt(yyyy);

    if (dd < 1 || dd > 31 || mm < 1 || mm > 12 || yyyy < 1953 || yyyy > 1998) {
        obj.innerHTML = "*Date is invalid: Values are outside the allowed ranges.";
        obj.style.color = 'red';
        return false;
    }

    let maxDays = 31;
    if (mm == 4 || mm == 6 || mm == 9 || mm == 11) {
        maxDays = 30;
    } else if (mm == 2) {
        maxDays = 28;
        if (yyyy % 4 == 0 && (yyyy % 100 != 0 || yyyy % 400 == 0)) {
            maxDays = 29;
        }
    }

    if (dd > maxDays) {
        obj.innerHTML = "*Date is invalid: Day is not valid for the selected month.";
        obj.style.color = 'red';
        return false;
    }
    obj.innerHTML = "Date Valid";
    obj.style.color = 'green';
    return true;
   
}

        </script>
</body>
</html>