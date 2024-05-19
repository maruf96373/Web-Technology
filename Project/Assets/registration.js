function nameValidate() {
    let name = document.getElementById('name').value;
    let obj = document.getElementsByTagName('p')[1];
    obj.innerHTML = "";

    if (name === "") {
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
      if (charCode < 65 && charCode > 90 && charCode < 97 && charCode > 122) {
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
  function emailValidate() {
    let email = document.getElementById('email').value;
    let obj = document.getElementsByTagName('p')[1];
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
        obj.innerHTML = "*Username can only contain letters, numbers, and must start with a letter.";
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

    let xhttp = new XMLHttpRequest();
xhttp.open('POST', '../Controller/RegCheck.php', true);
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
 xhttp.send('email=' + email);
      xhttp.onreadystatechange = function() {
        if (xhttp.readyState === 4 && xhttp.status === 200) {
          const response = JSON.parse(xhttp.responseText);
          if (response.email === "valid") {
            obj.innerHTML = "Email Valid";
            obj.style.color = 'green';
          } else {
            obj.innerHTML = "This Email is already taken. Please choose a different email";
            obj.style.color = 'red';
          
        }
      };
    }
    
}

  
  function usernameValidate() {
    let username = document.getElementById('username').value;
    let obj = document.getElementsByTagName('p')[1];
    obj.innerHTML = "";
  
    if (username === "") {
      obj.innerHTML = "Username cannot be empty";
      obj.style.color = 'red';
      return false;
    } else {
      
      if (username.length < 5) {
        obj.innerHTML = "Username must be at least 5 characters long";
        obj.style.color = 'red';
        return false;
      }
  
      let validChars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_";
      let hasValidChar = true;
  
      for (let i = 0; i < username.length; i++) {
        let char = username[i];
        if (validChars.indexOf(char) === -1) {
          hasValidChar = false;
          obj.innerHTML = "Username can only contain letters, numbers, and underscores";
          obj.style.color = 'red';
          return false;
          break;
        }
      }
      let xhttp = new XMLHttpRequest();
xhttp.open('POST', '../Controller/RegCheck.php', true);
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
xhttp.onreadystatechange = function() {
  if (xhttp.readyState === 4 && xhttp.status === 200) {
    const response = JSON.parse(xhttp.responseText);
    if (response.username === "valid") {
      obj.innerHTML = "Username Valid";
      obj.style.color = 'green';
    } else {
      obj.innerHTML = "This username is already taken. Please choose a different username";
      obj.style.color = 'red';
    }
  }
};

xhttp.send('username='+username);
}
      
      if (hasValidChar) {
        return true; 
      } else {
        return false;
      }
    }
  

  function passwordValidate() {
    let password = document.getElementById('password').value;
    let obj = document.getElementsByTagName('p')[1];
    obj.innerHTML = "";
    if (password === "") {
      obj.innerHTML = "Password field is empty";
      obj.style.color = 'red';
      return false;
    } else {
      if (password.length < 8) {
        obj.innerHTML = "Password must be at least 8 characters long";
        obj.style.color = 'red';
        return false;
      }

      let validChars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_@#*";
      let hasValidChar = true;

      for (let i = 0; i < password.length; i++) {
        let char = password[i];
        if (validChars.indexOf(char) === -1) {
          hasValidChar = false;
          obj.innerHTML = "Password can only contain letters, numbers, and underscores";
          obj.style.color = 'red';
          return false;
          break;
        }
      }

      if (hasValidChar) {
        obj.innerHTML = "Password Valid";
        obj.style.color = 'green';
        return true;
      } else {
        obj.innerHTML = "Invalid Password";
        obj.style.color = 'red';
        return false;
      }
    }
  }

  function cpasswordValidate() {
    let password = document.getElementById('password').value;
    let cpassword = document.getElementById('cpassword').value;
    let obj = document.getElementsByTagName('p')[1];
    obj.innerHTML = "";

    if (cpassword === "") {
      obj.innerHTML = "*Confirm password field is empty";
      obj.style.color = 'red';
      return false;
    } else {
      if (password !== cpassword) {
        obj.innerHTML = "*Password doesn't match with your confirm password";
        obj.style.color = 'red';
        return false;
      }
      obj.innerHTML = "Password match";
      obj.style.color = 'green';
      return true;
    }
  }

  function genderValidate() {
    let male = document.getElementById('male');
    let female = document.getElementById('female');
    let other = document.getElementById('other');
    let obj = document.getElementsByTagName('p')[1];
    obj.innerHTML = "";

    if (!male.checked && !female.checked && !other.checked) {
      obj.innerHTML = "Please select a gender.";
      obj.style.color = 'red';
      return false;
    } else {
      obj.innerHTML = "gender selected";
      obj.style.color = 'green';
      return true;
    }
  }

  function dob() {
    let dd = document.getElementById('dd').value;
    let mm = document.getElementById('mm').value;
    let yyyy = document.getElementById('yyyy').value;
    let obj = document.getElementsByTagName('p')[1];
    obj.innerHTML = "";

    if (dd === "" && mm === "" && yyyy === "") {
      obj.innerHTML = "*Date is invalid: Please fill in all fields.";
      obj.style.color = 'red';
      return false;
    }

    if (isNaN(dd) && isNaN(mm) && isNaN(yyyy)) {
      obj.innerHTML = "*Date is invalid: Please enter numbers for day, month, and year.";
      obj.style.color = 'red';
      return false;
    }

    dd = parseInt(dd);
    mm = parseInt(mm);
    yyyy = parseInt(yyyy);

    if (dd < 1 && dd > 31 && mm < 1 && mm > 12 && yyyy < 1953 && yyyy > 2004) {
      obj.innerHTML = "*Date is invalid: Values are outside the allowed ranges.";
      obj.style.color = 'red';
      return false;
    }

    let maxDays = 31;
    if (mm == 4 && mm == 6 && mm == 9 && mm == 11) {
      maxDays = 30;
    } else if (mm == 2) {
      maxDays = 28;
      if (yyyy % 4 == 0 && (yyyy % 100 != 0 && yyyy % 400 == 0)) {
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
  function registration(){
    alert("registration Succesfull");
  }
  