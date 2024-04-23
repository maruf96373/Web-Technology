<html>
<head>
    <title>Person Profile</title>
</head>
<body>
    <table align="center" border="1" style="border-collapse: collapse;" height="500;" width="400;">
        <tr>
            <th colspan="3"><h2>PERSON PROFILE</h2></th>
        </tr>
        <tr>
            <td>Name</td>
            <td>
                <div style="padding:4px;"><input type="text" name="username" id="username" value="" /></div>
                <p id="name-validation"></p> 
            </td>
            <td><div style="padding: 10;"></div></td>
        </tr>
        <tr>
            <td>Email</td>
            <td>
                <div style="padding:4px;"><input type="email" name="email" id="email" value="" /></div>
                <p id="email-validation"></p> 
            </td>
            <td><div style="padding: 10;"></div></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td>
                <input type="radio" name="gender" id="male" value="male" />Male
                <input type="radio" name="gender" id="female" value="female" />Female
                <input type="radio" name="gender" id="other" value="other" />Other
                <p id="gender-validation"></p> 
            </td>
            <td><div style="padding: 10;"></div></td>
        </tr>
        <tr>
            <td>Date Of Birth</td>
            <td>
                <div style="padding:4px;">
                    <input type="text" name="dd" id="dd" value="" style="width: 30px;" /> <b>/</b>
                    <input type="text" name="mm" id="mm" value="" style="width: 30px;" /> <b>/</b>
                    <input type="text" name="yyyy" id="yyyy" value="" style="width: 50px;" />
                    <i>(dd/mm/yyyy)</i>
                </div>
                <p id="dob-validation"></p> 
            </td>
            <td><div style="padding: 10;"></div></td>
        </tr>
        <tr>
            <td>Blood Group</td>
            <td>
                <select name="bloodGroup" id="bloodGroup">
                    <option value="">Select Blood Group</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
                <p id="bloodGroup-validation"></p> 
            </td>
            <td><div style="padding: 10;"></div></td>
        </tr>
        <tr>
            <td>Degree</td>
            <td>
                <input type="checkbox" name="check[]" id="ssc" value="SSC" onchange="validateDegree()" />SSC
                <input type="checkbox" name="check[]" id="hsc" value="HSC" onchange="validateDegree()" />HSC
                <input type="checkbox" name="check[]" id="bsc" value="BSc" onchange="validateDegree()" />BSc 
                <input type="checkbox" name="check[]" id="msc" value="MSc" onchange="validateDegree()" />MSc 
                <p id="degree-validation"></p> 
            </td>
            <td><div style="padding: 10;"></div></td>
        </tr>
        <tr>
            <td>Photo</td>
            <td colspan="2">
                <div style="padding:4px;"><input type="file" name="myfile" id="myfile" value="" /></div>
                <p id="photo-validation"></p> 
            </td>
        </tr>
        <tr>
            <td colspan="3" align="right"><br><br></td>
        </tr>
        <tr>
            <td colspan="3" align="right">
                <div style="padding:4px;">
                    <input type="submit" name="submit" value="Submit" onclick="validateForm()" />
                    <input type="reset" name="reset" value="Reset" />
                </div>
            </td>
        </tr>
    </table>

    <script>
        function validateForm() {
           
            if (!validateName() || !validateEmail() || !validateGender() || !validateDOB() || !validateBloodGroup() || !validateDegree() || !validatePhoto()) {
                return false; 
            }
            return true; 
        }

        function validateName() {
            let name = document.getElementById('username').value;
            let obj = document.getElementById('name-validation');
            obj.innerHTML = "";

            if (!name.trim()) {
                obj.innerHTML = "*Name cannot be empty";
                obj.style.color = 'red';
                return false;
            }

            const words = name.split(/\s+/);
            if (words.length < 2) {
                obj.innerHTML = "*Name must contain at least two words";
                obj.style.color = 'red';
                return false;
            }

            for (const word of words) {
                const charCode = word[0].charCodeAt(0);
                if (charCode < 65 || charCode > 90 && charCode < 97 || charCode > 122) {
                    obj.innerHTML = "*All words must start with a letter.";
                    obj.style.color = 'red';
                    return false;
                }
            }

            const allowedChars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ.- ';
            if (!name.split('').every(char => allowedChars.includes(char))) {
                obj.innerHTML = "*Input can only contain letters (a-z, A-Z), periods (.), dashes (-), and spaces.";
                obj.style.color = 'red';
                return false;
            }

            obj.innerHTML = "Valid name";
            obj.style.color = 'green';
            return true;
        }

        function validateEmail() {
            let email = document.getElementById('email').value;
    let obj = document.getElementById('email-validation');
    obj.innerHTML = "";

    if (email === "") {
        obj.innerHTML = "*Email Address Cannot be Empty";
        obj.style.color = 'red';
        return false;
    }

    const atPos = email.indexOf("@");
    if (atPos === -1 || atPos === 0 || atPos === email.length - 1) {
        obj.innerHTML = "*Email must contain '@' symbol not at the beginning or end.";
        obj.style.color = 'red';
        return false;
    }

    const username = email.substring(0, atPos);
    const domain = email.toLowerCase().substring(atPos + 1);

    if (username.length === 0 || !isUsernameValid(username)) {
        obj.innerHTML = "Username can only contain letters, numbers, and must start with a letter.";
        obj.style.color = 'red';
        return false;
    }

    function isUsernameValid(username) {
        const firstChar = username.charAt(0);
        if (isNaN(firstChar * 1)) {
            const validChars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            for (let i = 1; i < username.length; i++) {
                const char = username.charAt(i);
                if (!validChars.includes(char)) {
                    return false;
                }
            }
            return true;
        }
        return false;
    }

    if (domain !== "gmail.com" && domain !== "yahoo.com") {
        obj.innerHTML = "Only Gmail and Yahoo email addresses are allowed.";
        obj.style.color = 'red';
        return false;
    }

    obj.innerHTML = "Valid Email Address";
    obj.style.color = 'green';
    return true;
        }

        function validateGender() {
            const genderForm = document.getElementById('genderForm');
      const genderElements = genderForm.elements['gender']; 

    
      let selected = false;
      for (let i = 0; i < genderElements.length; i++) {
        if (genderElements[i].checked) {
          selected = true;
          break; 
        }
      }

      const resultElement = document.getElementById('result');

      if (selected) {
        const selectedGender = genderElements.value; 
        resultElement.textContent = "Selected gender: " + selectedGender;
      } else {
        resultElement.textContent = "Please select a gender.";
      }
        }

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

        function validateDegree() {
            let  ssc = document.getElementById('ssc').checked;
            let  hsc = document.getElementById('hsc').checked;
            let  bsc = document.getElementById('bsc').checked;
            let  msc = document.getElementById('msc').checked;
            let  obj = document.getElementById('degree-validation');
            
            if (!(ssc || hsc || bsc || msc)) {
                obj.innerHTML = "*Please select at least two degrees.";
                obj.style.color = 'red';
                return false;
            }
            
            obj.innerHTML = "Selected Degrees: ";
            let  selectedDegrees = [];
            if (ssc) selectedDegrees.push("SSC");
            if (hsc) selectedDegrees.push("HSC");
            if (bsc) selectedDegrees.push("BSc");
            if (msc) selectedDegrees.push("MSc");
            obj.innerHTML += selectedDegrees.join(", ");
            obj.style.color = 'green';
            return true;
        }

        function validatePhoto() {
            let photo = document.getElementById('myfile').value;
            let obj = document.getElementById('photo-validation');
            obj.innerHTML = "";

            if (photo === "") {
                obj.innerHTML = "*Photo cannot be empty.";
                obj.style.color = 'red';
                return false;
            }

            obj.innerHTML = "Valid photo";
            obj.style.color = 'green';
            return true;
        }
    </script>
</body>
</html>
