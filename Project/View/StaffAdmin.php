
<?php
if(!isset($_COOKIE['flag'])){
    header('location: login.php');
}


?>


<html>
<head>
    <title>Staff Management</title>
    <link rel="stylesheet" href="../Assets/Admin.css"/>
</head>
<body id="b8">
<fieldset id="b9">
<img src="../Assets/logo.png" id="logo-image">
    <h3 id="b1"><u>Click & Stay</u></h3>
    
    <h4 id="b10">Find your next stay</h4>
    <a id="b11" href="StaffView.php">See Staff List</a>
                <a id="b4" href="AdminHome.php">Home</a></b>
      
</fieldset>

<h3></h3>
<form method="post" action="../Controller/staffAddCheck.php" enctype="multipart/form-data">
    <table align="center" class="c1">
        <tr class="c1">
            <td> Staff Id:</td>
            <td>
                <div style="padding: 3px;"><input type="text" name="staffId" id="staffId" onkeyup="validateId()" />
                </div>
              
            </td>
        </tr> 
        <tr class="c1">
            <td> Staff Name:</td>
            <td>
                <div style="padding: 3px;"><input type="text" name="staffName" id="staffName" onkeyup="validateName()" />
                </div>
                
            </td>
        </tr> 
        <tr class="c1">
            <td>Email:</td>
            <td>
                <div style="padding: 3px;"><input type="text" id="email" name="email" onkeyup="validateEmail()" />
                </div>
               
            </td>
        </tr> 
        <tr class="c1">
            <td>Department:</td>
            <td>
                <div style="padding: 3px;">
                    <select name="department" id="department" onchange="validateDepartment()" >
                        <option value="">Select</option>
                        <option value="Housekeeping">Housekeeping</option>
                        <option value="Food">Food</option>
                        <option value="Accounting">Accounting</option>
                        <option value="Security">Security</option>
                        <option value="Human Resource">Human Resource</option>
                    </select>
                </div>
            </td> 
        </tr>
        <tr class="c1">
            <td>Contact:</td>    
            <td>
                <div style="padding: 3px;"><input type="text" name="contact" id="contact" onkeyup="validateContact()">
                </div>
            </td>
          
        </tr>
        <tr class="c1">
            <td>Salary:</td>
            <td>
                <div style="padding: 3px;"><input type="Number" name="salary" id="salary" onkeyup="validateSalary()"/>
                    
                </div>
            </td>
        </tr>
        <tr class="c1">
          
            <td>Account Status:</td>
            <td>
                <div style="padding: 3px;">
                    <select name="accountStatus" id="accountStatus" onchange="validateStatus()"  >
                        <option value="">Select</option>
                        <option value="active">Active</option>
                        <option value="busy">Busy</option>
                        <option value="inactive">In Active</option>
                    </select>
                </div>
                </td>
        </tr>
        <tr  class="c1">
           
           <td>staff Pic:</td>    
               
  <td> <div style="padding: 3px;">  <input type="file" name="proPic" accept="image/*"  id="proPic"value="" onchange=" validateFilename()" /> <br></td>
 
       
</tr>
    </table>
   
    <tr>
        <td colspan="2" style="text-align: center;">
            <div style="padding: 3px;">
                
                <button type="submit" id="b7">Add</button>
                
            </div>
        </td>
    </tr>
</form>

<script>
   function validateId() {
    let staffId = document.getElementById('staffId').value;
    let obj = document.getElementsByTagName('h3')[1];
    if (staffId === "") {
        obj.innerHTML = "Id cannot be empty";
        obj.style.color = 'red';
        return false;
    } 

    if (staffId.length !== 2 || parseInt(staffId) <= 0) {
        obj.innerHTML = "Staff Id must be 2 digits long and greater than 0";
        obj.style.color = 'red';
        return false;
    } 
    
    
    else{
    let xhttp = new XMLHttpRequest();
      xhttp.open('POST', '../Controller/StaffAddCheck.php', true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhttp.onreadystatechange = function() {
          if (xhttp.readyState === 4 && xhttp.status === 200) {
            const response = JSON.parse(xhttp.responseText);   
            if (response.staffId === "valid") {
              obj.innerHTML = "Id Valid";
              obj.style.color = 'black';
              return true;
            } else {
              obj.innerHTML = "This Id is already taken. Please choose a different Id";
              obj.style.color = 'red';
              return false;
            }
          }
        };
     
        xhttp.send('staffId='+staffId);
      }

  }
  


function validateFilename() {
    let fileInput = document.getElementById('proPic');
    let obj = document.getElementsByTagName('h3')[1];
    if (!fileInput.files || !fileInput.files.length) {
        obj.innerHTML = "Please select a picture";
        obj.style.color = 'red';
        return false;
    } else {
        obj.innerHTML = " valid picture"; 
        obj.style.color = 'black';
        return true;
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
        return false;
    }

   
    else{
    let xhttp = new XMLHttpRequest();
      xhttp.open('POST', '../Controller/StaffAddCheck.php', true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhttp.onreadystatechange = function() {
          if (xhttp.readyState === 4 && xhttp.status === 200) {
            const response = JSON.parse(xhttp.responseText);   
            if (response.email === "valid") {
              obj.innerHTML = "Email Valid";
              obj.style.color = 'black';
              return true;
            } else {
              obj.innerHTML = "This Email is already taken. Please choose a different Id";
              obj.style.color = 'red';
              return false;
            }
          }
        };
     
        xhttp.send('email='+email);
      }

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
    if (salary === "") {
        obj.innerHTML = "salary cannot be empty";
        obj.style.color = 'red';
        return false;
    } 
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

    if (contact === "") {
        obj.innerHTML = "Contact cannot be empty";
        obj.style.color = 'red';
        return false;
    } 

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

    else {
        obj.innerHTML = "Valid contact";
        obj.style.color = 'black';
        return true;
    }
}


</script>

</body>
</html>
