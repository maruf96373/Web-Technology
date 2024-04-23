<html>
<head>
    <title>Profile Picture</title>
</head>
<body>
    <form method="" action="" enctype="">
        <Table>
            <tr align="left">
                <fieldset style="width: 310;">
                    <legend>Profile Picture</legend>
                    User Id   <input type="text" name="userId" id="userId" value="" /> <br>
                    <div style="padding: 3px;"> Picture<input type="file" name="myfile" id="myfile" /> </div>
                    <p id="userId-validation"></p> 
                    <p id="picture-validation"></p> 
                    <hr>
                    <div style="padding: 3px;"> <input type="button" value="Submit" onclick="validateForm()"/></div>
                </fieldset>
            </tr>
        </Table>
    </form>
    <script>
        function validateForm() {
            let userId = document.getElementById('userId').value;
            let picture = document.getElementById('myfile').value;
            let userIdObj = document.getElementById('userId-validation');
            let pictureObj = document.getElementById('picture-validation');
            userIdObj.innerHTML = "";
            pictureObj.innerHTML = "";

            if (userId === "") {
                userIdObj.innerHTML = "*User Id cannot be empty.";
                userIdObj.style.color = 'red';
                return false;
            }

            if (!isPositiveNumber(userId)) {
                userIdObj.innerHTML = "*User Id has to be a positive number.";
                userIdObj.style.color = 'red';
                return false;
            }

            if (picture === "") {
                pictureObj.innerHTML = "*Picture cannot be empty.";
                pictureObj.style.color = 'red';
                return false;
            }

            return true;
        }

        function isPositiveNumber(value) {
            return /^\d+$/.test(value) && parseInt(value) > 0;
        }
    </script>
</body>
</html>
