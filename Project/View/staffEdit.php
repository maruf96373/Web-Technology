<?php
 session_start();
 $staff = $_SESSION['staff'];
 
if(!isset($_COOKIE['flag'])){
    header('location: login.php');
}
require_once('../Model/staffadmin.php');
$staffId = isset($_GET['staffId']) ? $_GET['staffId'] : '';
   
    
  $StaffEdit=staffEdit($staffId);
   
   
    
    
 
?>
 

<html>
<head>
    <title>Edit Room</title>
    <link rel="stylesheet" href="../Assets/Admin.css"/>
</head>
<body id="b8">
<fieldset id="b9">
<img src="../Assets/logo.png" id="logo-image">
    <h3 id="b1"><u>Click & Stay</u></h3>
    
    <h4 id="b10">Find your next stay</h4>
    <a id="b4" href="StaffView.php">Back</a>  
   
</fieldset>

<h3></h3>

    <form method="post" action="../Controller/staffEditCheck.php"enctype="multipart/form-data" >
        <table align="center" class="c1">
        <?php for($i=0; $i<count($StaffEdit); $i++){?>
            <tr class="c1">
            <td> Staff Id:</td>
                <td>
                    <div style="padding: 3px;"><input type="text" name="staffId" value="<?php echo $StaffEdit[$i]['staffId']; ?>"id="staffId" readonly />
                        
                    </div>
                </td>
            </tr> 
            <tr class="c1">
                <td> Staff Name:</td>
                <td>
                    <div style="padding: 3px;"><input type="text" name="staffName" value="<?php echo $StaffEdit[$i]['staffName']; ?>"id="staffName" onkeyup="validateName()"/>
                        
                    </div>
                </td>
            </tr> 
            <tr class="c1">
                <td>Email:</td>
                <td>
                    <div style="padding: 3px;"><input type="text" name="email"value="<?php echo $StaffEdit[$i]['email']; ?>" id="email" name="email" onkeyup="validateEmail()"/>
                        
                    </div>
                </td>
            </tr> 
            <tr class="c1">
                <td>Department:</td>
                <td>
                    <div style="padding: 3px;">
                        <select name="department" id="department" onchange="validateDepartment()">
                            <option value="Housekeeping"<?php if ($StaffEdit[$i]['department'] == 'Housekeeping') echo 'selected="selected"'; ?>>Housekeeping</option>
                            <option value="Food"<?php if ($StaffEdit[$i]['department'] == 'Food') echo 'selected="selected"'; ?>>Food</option>
                            <option value="Accounting"<?php if ($StaffEdit[$i]['department'] == 'Accounting') echo 'selected="selected"'; ?>>Accounting</option>
                            <option value="Security"<?php if ($StaffEdit[$i]['department'] == 'Security') echo 'selected="selected"'; ?>>Security</option>
                            <option value="Human Resource"<?php if ($StaffEdit[$i]['department'] == 'Human Resource') echo 'selected="selected"'; ?>>Human Resource</option>
                        </select>
                    </div>
                </td> 
            </tr>
            <tr class="c1">
                <td>Contact:</td>    
                <td>
                    <div style="padding: 3px;">
                        <input type="text" name="contact" value="<?php echo $StaffEdit[$i]['contact']; ?>"id="contact" onkeyup="validateContact()"/>
                    </div>
                </td>
            </tr>
            <tr class="c1">
                <td>Salary:</td>
                <td>
                    <div style="padding: 3px;">
                        <input type="number" name="salary"value="<?php echo $StaffEdit[$i]['salary']; ?>"id="salary" onkeyup="validateSalary()"/>
                    </div>
                </td>
            </tr>
            <tr class="c1">
                <td>Account Status:</td>
                <td>
                    <div style="padding: 3px;">
                        <select name="accountStatus"id="accountStatus" onchange="validateStatus()">
                            <option value="active"<?php if ($StaffEdit[$i]['accountStatus'] == 'active') echo 'selected="selected"'; ?>>Active</option>
                            <option value="busy"<?php if ($StaffEdit[$i]['accountStatus'] == 'busy') echo 'selected="selected"'; ?>>Busy</option>
                            <option value="inactive"<?php if ($StaffEdit[$i]['accountStatus'] == 'inactive') echo 'selected="selected"'; ?>>In Active</option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr class="c1">
            <td>staff Pic:</td><td>
    <input type="file" name="proPic" accept="image/*" id="proPic"onchange=" validateFilename()"   /></td>

             
           
                <img src="<?php echo $StaffEdit[$i]['proPic']; ?>" alt="Room Picture" class="room-pic-img">
           
       
    
</tr>
    <tr class="c1">
        <td colspan="2" style="text-align: center;">
            <div style="padding: 5px;">
                <button id="b7" onclick="validateEdit()">Update</button>
                </div>
        </td>
    </tr>
                </table> 

                
            
    <?php } ?>


    
</form>
<script>
     
function validateFilename() {
    let fileInput = document.getElementById('proPic');
    let obj = document.getElementsByTagName('h3')[1];
    if (!fileInput.files || !fileInput.files.length) {
        obj.innerHTML = "Please select a picture";
        obj.style.color = 'red';
        return false;
    } else {
        obj.innerHTML = " valid picture"; 
    }
}
function validateName() {
    let name = document.getElementById('staffName').value;
    let obj = document.getElementsByTagName('h3')[1]; 

    if (name === "") {
        obj.innerHTML = "Name cannot be empty";
        obj.style.color = 'red';
        return false;
    } 

    let words = name.split(/\s+/);
    if (words.length < 2) {
        obj.innerHTML = "Name must contain at least two words";
        obj.style.color = 'red';
        return false;
    }

    for (let word of words) {
        for (let i = 0; i < word.length; i++) {
            let charCode = word.charCodeAt(i);
            if ((charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122)) {
                obj.innerHTML = "Name can only contain letters (a-z, A-Z).";
                obj.style.color = 'red';
                return false;
            }
        }
    }

    obj.style.color = 'black';
    obj.innerHTML = "Valid name";
    return true;
}

    
    function validateEmail() {
        let email = document.getElementById('email').value;
        let obj = document.getElementsByTagName('h3')[1]; 

        if (email === "") {
            obj.innerHTML = "Email Address Cannot be Empty";
            obj.style.color = 'red';
            return false;
        } 

        let isValid = true;
        let atPos = email.indexOf("@");

        if (atPos === -1 || atPos !== email.length - 10 || email.substr(atPos) !== "@gmail.com") {
            isValid = false;
            obj.innerHTML = "Email must be a Gmail address ending with '@gmail.com'";
            obj.style.color = 'red';
        }

        if (isValid) {
            obj.style.color = 'black';
            obj.innerHTML = "Valid Email Address";
        }

        return isValid;
    }
    
    function validateDepartment() {
        let selectedDp = document.getElementById('department').value;
        let obj = document.getElementsByTagName('h3')[1];

        if (selectedDp === "") {
            obj.innerHTML = "Please select a department.";
            obj.style.color = 'red';
            return false;
        } else {
            obj.innerHTML = "Selected department: " + selectedDp;
            obj.style.color = 'black';
            return true;
        }
    }
    function validateStatus() {
        let selectedAc = document.getElementById('accountStatus').value;
        let obj = document.getElementsByTagName('h3')[1];

        if (selectedAc === "") {
            obj.innerHTML = "Please select a status.";
            obj.style.color = 'red';
            return false;
        } else {
            obj.innerHTML = "Selected status: " + selectedAc;
            obj.style.color = 'black';
            return true;
        }
    }
    function validateSalary() {
    let salary = document.getElementById('salary').value;
    let obj = document.getElementsByTagName('h3')[1];

    if (isNaN(salary) || parseFloat(salary) < 3000 || parseFloat(salary) < 0) {
        obj.innerHTML = "Salary must be a positive value greater than 0 or equal to 3000";
        obj.style.color = 'red';
        return false;
    } else {
        obj.innerHTML = "Valid salary";
        obj.style.color = 'black';
        return true;
    }
}

function validateContact() {
    let contact = document.getElementById('contact').value;
    let obj = document.getElementsByTagName('h3')[1];

    if (contact.length !== 14) {
        obj.innerHTML = "Contact must be 14 digits long";
        obj.style.color = 'red';
        return false;
    }
    
   let num = ["+88017", "+88019", "+88018", "+88015", "+88016", "+88013"];
    if (!num.includes(contact.substring(0, 6))) {
        obj.innerHTML = "Contact must start with +88017, +88019, +88018, +88015, +88016, or +88013";
        obj.style.color = 'red';
        return false;
    }
    
    obj.innerHTML = "Valid contact";
    obj.style.color = 'black';
    return true;
}


            function validateEdit(){
                
                
                   alert ( "are u sure u want to update it?");
            }
        
   </script>
</body>
</html>