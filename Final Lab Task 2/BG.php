<html>
<head>
    <title>Blood Group</title>
</head>
<body>
    <form method="" action="" enctype="">
        <Table>
            <tr align="left">
                <fieldset style="width: 300;">
                    <legend><b>BLOOD GROUP</b></legend>
                    <select name="BG" id="bloodGroup" onchange="validateBloodGroup()">
                        <option value="">Select Blood Group</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                    </select> 
                    <p id="bloodGroup-validation"></p> 
                    <hr>
                    <div style="padding: 3px;"> <input type="button" name="submit" value="Submit" onclick="validateBloodGroup()" /></div>
                </fieldset>
            </tr>
        </Table>
    </form>
    <script>
        function validateBloodGroup() {
            let bloodGroup = document.getElementById('bloodGroup').value;
            let obj = document.getElementById('bloodGroup-validation');

            if (bloodGroup === "") {
                obj.innerHTML = "*Please select a valid Blood Group.";
                obj.style.color = 'red';
                return false;
            }

            obj.innerHTML = "Selected Blood Group: " + bloodGroup;
            obj.style.color = 'green';
            return true;
        }
    </script>
</body>
</html>
